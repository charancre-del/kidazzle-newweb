import zipfile
import xml.etree.ElementTree as ET
import sys
import os

docx_path = 'kidazzlehtmlallpages.docx'

if not os.path.exists(docx_path):
    print(f"File {docx_path} not found.")
    sys.exit(1)

text = []
try:
    with zipfile.ZipFile(docx_path) as z:
        # Check if 'word/document.xml' exists, sometimes structure varies
        if 'word/document.xml' not in z.namelist():
             print("word/document.xml not found in zip.")
             sys.exit(1)
             
        with z.open('word/document.xml') as f:
            tree = ET.parse(f)
            root = tree.getroot()
            # Namespaces usually bound, but we can search by local name or just iterate all text
            # Simple iteration over all 't' (text) elements is robust
            
            # We want to preserve paragraphs roughly
            # Find all paragraphs <w:p>
            # Inside, find <w:t>
            
            # Fallback: get all text
            def local_name(tag):
                return tag.split('}')[-1] if '}' in tag else tag

            all_text = []
            for elem in root.iter():
                 if local_name(elem.tag) == 't' and elem.text:
                     all_text.append(elem.text)
                 elif local_name(elem.tag) == 'br':
                     all_text.append('\n')
                 elif local_name(elem.tag) == 'cr':
                     all_text.append('\n')
                 elif local_name(elem.tag) == 'p':
                     all_text.append('\n') # Paragraph break
            
            with open('kidazzle_source_dump.html', 'w', encoding='utf-8') as outfile:
                 outfile.write("".join(all_text))
            print("Extraction complete.")
except Exception as e:
    print(f"Error: {e}")
