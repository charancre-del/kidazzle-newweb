import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const reportsDir = path.join(__dirname, 'lighthouse-reports');
const outputFile = path.join(reportsDir, 'audit-issues.txt');

let output = '';

fs.readdirSync(reportsDir).forEach(file => {
    if (file.endsWith('.json') && file !== 'audit-summary.json') {
        const content = fs.readFileSync(path.join(reportsDir, file), 'utf-8');
        const jsonReport = JSON.parse(content);

        output += `\n==================================================\n`;
        output += `PAGE: ${jsonReport.finalUrl}\n`;
        output += `SCORES: Performance: ${jsonReport.categories.performance.score * 100}, Accessibility: ${jsonReport.categories.accessibility.score * 100}, Best Practices: ${jsonReport.categories['best-practices'].score * 100}, SEO: ${jsonReport.categories.seo.score * 100}\n`;
        output += `==================================================\n`;

        ['performance', 'accessibility', 'best-practices', 'seo'].forEach(category => {
            output += `\n[${category.toUpperCase()}]\n`;
            const auditRefs = jsonReport.categories[category].auditRefs;

            auditRefs.forEach(ref => {
                const audit = jsonReport.audits[ref.id];
                // Show items with score < 1 or null score (informative) but usually we care about < 1
                // For performance, we care about opportunities and diagnostics
                if (audit.score !== 1 && audit.scoreDisplayMode !== 'notApplicable' && audit.scoreDisplayMode !== 'informative') {
                    output += ` - ${audit.title} (Score: ${audit.score})\n`;
                    if (audit.displayValue) output += `   Value: ${audit.displayValue}\n`;
                    if (audit.description) output += `   Description: ${audit.description.split('.')[0]}.\n`; // First sentence
                }
            });
        });
    }
});

fs.writeFileSync(outputFile, output);
console.log('Issues extracted to audit-issues.txt');
