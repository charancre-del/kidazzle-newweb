import json

# Load the schema
with open('schema.jsonld', 'r', encoding='utf-8') as f:
    data = json.load(f)

graph = data['@graph']

# Map IDs to nodes for easy lookup
nodes = {node['@id']: node for node in graph}

# Target classes
target_classes = [
    'schema:Article',
    'schema:LocalBusiness',
    'schema:Organization',
    'schema:Person',
    'schema:Event',
    'schema:Service',
    'schema:Product',
    'schema:Review',
    'schema:FAQPage',
    'schema:JobPosting',
    'schema:HowTo',
    'schema:VideoObject'
]

# Helper to get parent classes
def get_parents(class_id):
    parents = []
    node = nodes.get(class_id)
    if not node:
        return parents
    
    subClassOf = node.get('rdfs:subClassOf')
    if subClassOf:
        if isinstance(subClassOf, list):
            for parent in subClassOf:
                parents.append(parent['@id'])
                parents.extend(get_parents(parent['@id']))
        else:
            parents.append(subClassOf['@id'])
            parents.extend(get_parents(subClassOf['@id']))
    return parents

# Find all properties for each class
class_properties = {cls: set() for cls in target_classes}

for node in graph:
    if node['@type'] == 'rdf:Property':
        domain_includes = node.get('schema:domainIncludes')
        if domain_includes:
            domains = []
            if isinstance(domain_includes, list):
                domains = [d['@id'] for d in domain_includes]
            else:
                domains = [domain_includes['@id']]
            
            for target in target_classes:
                # Check if property applies directly to target
                if target in domains:
                    class_properties[target].add(node['rdfs:label'])
                    continue
                
                # Check if property applies to a parent of target
                # (This is expensive, so we might just list direct properties + common parents)
                # Optimization: We will just check if the domain is a parent of our target
                # But we need to know the parents of our target first.
                pass

# Pre-calculate parents for targets
target_parents = {}
for target in target_classes:
    target_parents[target] = set(get_parents(target))

# Re-scan properties with parent awareness
for node in graph:
    if node['@type'] == 'rdf:Property':
        domain_includes = node.get('schema:domainIncludes')
        if domain_includes:
            domains = []
            if isinstance(domain_includes, list):
                domains = [d['@id'] for d in domain_includes]
            else:
                domains = [domain_includes['@id']]
            
            for target in target_classes:
                # If the property belongs to the class OR any of its parents
                if target in domains or not target_parents[target].isdisjoint(domains):
                    label = node.get('rdfs:label')
                    if isinstance(label, dict):
                        label = label.get('@value', str(label))
                    class_properties[target].add(str(label))

# Output results
for cls in target_classes:
    print(f"\n--- {cls} ---")
    # Sort and print, filtering out deprecated or superseded if possible (not doing deep check here)
    props = sorted(list(class_properties[cls]))
    # Filter out some very generic ones if list is too long, but user asked not to miss any.
    # We will print all of them.
    print(", ".join(props))
