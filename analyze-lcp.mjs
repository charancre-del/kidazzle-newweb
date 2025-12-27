import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const reportsDir = path.join(__dirname, 'lighthouse-reports');
const filename = 'locations-midway-campus.json';
const filePath = path.join(reportsDir, filename);

if (fs.existsSync(filePath)) {
    const content = fs.readFileSync(filePath, 'utf-8');
    const json = JSON.parse(content);

    const blocking = json.audits['render-blocking-insight']; // Changed from render-blocking-resources
    if (blocking && blocking.details && blocking.details.items) {
        console.log('\nRENDER BLOCKING RESOURCES:');
        blocking.details.items.forEach(item => {
            console.log(` - ${item.url} (Wasted ms: ${item.wastedMs})`);
        });
    }

    const networkRequests = json.audits['network-requests'];
    if (networkRequests && networkRequests.details && networkRequests.details.items) {
        console.log('\nLARGEST NETWORK REQUESTS:');
        const sortedRequests = networkRequests.details.items.sort((a, b) => b.resourceSize - a.resourceSize).slice(0, 10);
        sortedRequests.forEach(item => {
            console.log(` - ${item.url} (Size: ${(item.resourceSize / 1024).toFixed(2)} KB, Time: ${item.endTime - item.startTime} ms)`);
        });
    }

    // Check for large layout shifts which might indicate image loading issues
    const cls = json.audits['cumulative-layout-shift'];
    if (cls && cls.details && cls.details.items) {
        console.log('\nLAYOUT SHIFTS:');
        cls.details.items.forEach(item => {
            console.log(` - Shift: ${item.score}`);
        });
    }
}
