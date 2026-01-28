import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const reportsDir = path.join(__dirname, 'lighthouse-reports');
const summaryFile = path.join(reportsDir, 'audit-summary.json');

const summary = [];

fs.readdirSync(reportsDir).forEach(file => {
    if (file.endsWith('.json') && file !== 'audit-summary.json') {
        const content = fs.readFileSync(path.join(reportsDir, file), 'utf-8');
        const jsonReport = JSON.parse(content);

        summary.push({
            url: jsonReport.finalUrl,
            filename: file.replace('.json', ''),
            scores: {
                performance: jsonReport.categories.performance.score * 100,
                accessibility: jsonReport.categories.accessibility.score * 100,
                bestPractices: jsonReport.categories['best-practices'].score * 100,
                seo: jsonReport.categories.seo.score * 100
            },
            audits: {
                'largest-contentful-paint': jsonReport.audits['largest-contentful-paint'],
                'first-contentful-paint': jsonReport.audits['first-contentful-paint'],
                'cumulative-layout-shift': jsonReport.audits['cumulative-layout-shift'],
                'total-blocking-time': jsonReport.audits['total-blocking-time'],
                'speed-index': jsonReport.audits['speed-index'],
                'interactive': jsonReport.audits['interactive']
            }
        });
    }
});

fs.writeFileSync(summaryFile, JSON.stringify(summary, null, 2));
console.log('Summary generated.');
