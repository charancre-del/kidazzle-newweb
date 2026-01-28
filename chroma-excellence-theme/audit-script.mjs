import fs from 'fs';
import path from 'path';
import lighthouse from 'lighthouse';
import * as chromeLauncher from 'chrome-launcher';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const urls = [
    'https://x3yyntt5tp.wpdns.site/',
    'https://x3yyntt5tp.wpdns.site/about/',
    'https://x3yyntt5tp.wpdns.site/contact-us/',
    'https://x3yyntt5tp.wpdns.site/curriculum/',
    'https://x3yyntt5tp.wpdns.site/newsroom/',
    'https://x3yyntt5tp.wpdns.site/careers/',
    'https://x3yyntt5tp.wpdns.site/employers/',
    'https://x3yyntt5tp.wpdns.site/parents/',
    'https://x3yyntt5tp.wpdns.site/privacy-policy/',
    'https://x3yyntt5tp.wpdns.site/programs/',
    'https://x3yyntt5tp.wpdns.site/locations/',
    // Programs
    'https://x3yyntt5tp.wpdns.site/programs/infant-care/',
    'https://x3yyntt5tp.wpdns.site/programs/toddler-care/',
    'https://x3yyntt5tp.wpdns.site/programs/preschool/',
    'https://x3yyntt5tp.wpdns.site/programs/pre-k/',
    'https://x3yyntt5tp.wpdns.site/programs/pre-k-prep/',
    'https://x3yyntt5tp.wpdns.site/programs/ga-pre-k/',
    'https://x3yyntt5tp.wpdns.site/programs/after-school/',
    'https://x3yyntt5tp.wpdns.site/programs/camp-summer-winter-fall/',
    // Locations
    'https://x3yyntt5tp.wpdns.site/locations/tramore-campus-austell/',
    'https://x3yyntt5tp.wpdns.site/locations/tyrone-campus/',
    'https://x3yyntt5tp.wpdns.site/locations/west-cobb-campus/',
    'https://x3yyntt5tp.wpdns.site/locations/rivergreen-campus/',
    'https://x3yyntt5tp.wpdns.site/locations/roswell-campus/',
    'https://x3yyntt5tp.wpdns.site/locations/satellite-bvd-campus/',
    'https://x3yyntt5tp.wpdns.site/locations/south-cobb-campus-austell/',
    'https://x3yyntt5tp.wpdns.site/locations/midway-campus/',
    'https://x3yyntt5tp.wpdns.site/locations/newnan/',
    'https://x3yyntt5tp.wpdns.site/locations/north-hall-campus-murraysville/',
    'https://x3yyntt5tp.wpdns.site/locations/pleasanthill-campus-duluth/',
    'https://x3yyntt5tp.wpdns.site/locations/cherokee-campus/',
    'https://x3yyntt5tp.wpdns.site/locations/east-cobb-campus/'
];

const outputDir = path.join(__dirname, 'lighthouse-reports');

if (!fs.existsSync(outputDir)) {
    fs.mkdirSync(outputDir);
}

async function runAudit() {
    const chrome = await chromeLauncher.launch({ chromeFlags: ['--headless'] });
    const options = { logLevel: 'info', output: 'html', onlyCategories: ['performance', 'accessibility', 'best-practices', 'seo'], port: chrome.port };

    const summary = [];

    for (const url of urls) {
        console.log(`Auditing ${url}...`);
        try {
            const runnerResult = await lighthouse(url, options);
            const reportHtml = runnerResult.report;

            // Create a filename from the URL
            const urlObj = new URL(url);
            let filename = urlObj.pathname.replace(/\//g, '-').replace(/^-|-$/g, '');
            if (filename === '') filename = 'homepage';

            fs.writeFileSync(path.join(outputDir, `${filename}.html`), reportHtml);

            // Save JSON report as well for analysis
            const jsonReport = runnerResult.lhr;
            fs.writeFileSync(path.join(outputDir, `${filename}.json`), JSON.stringify(jsonReport, null, 2));

            summary.push({
                url: url,
                filename: filename,
                scores: {
                    performance: jsonReport.categories.performance.score * 100,
                    accessibility: jsonReport.categories.accessibility.score * 100,
                    bestPractices: jsonReport.categories['best-practices'].score * 100,
                    seo: jsonReport.categories.seo.score * 100
                }
            });

            console.log('Report is done for', runnerResult.lhr.finalUrl);
            console.log('Performance score was', runnerResult.lhr.categories.performance.score * 100);
        } catch (e) {
            console.error(`Error auditing ${url}:`, e);
        }
    }

    await chrome.kill();

    fs.writeFileSync(path.join(outputDir, 'audit-summary.json'), JSON.stringify(summary, null, 2));
    console.log('Audit complete. Reports saved to', outputDir);
}

runAudit();
