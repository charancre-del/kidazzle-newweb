# Kidazzle Theme Setup Guide

## 1. Installation
1. Go to **Appearance > Themes** in your WordPress Admin.
2. Click **Add New**, then **Upload Theme**.
3. Upload `kidazzle-theme.zip` and click **Install Now**.
4. Click **Activate**.

## 2. Homepage Configuration
1. Go to **Settings > Reading**.
2. Under "Your homepage displays", select **A static page**.
3. For **Homepage**, select your "Home" page (if it doesn't exist, create a page named "Home" and assign the "Front Page" template if needed, or just let the theme handle it).
4. Click **Save Changes**.

## 3. Menu Setup
1. Go to **Appearance > Menus**.
2. Create a new menu naming it "Primary Menu".
3. Add your main pages: Home, Programs, Curriculum, Locations, Resources, Contact.
4. Under "Menu Settings", check **Primary Menu**.
5. Click **Save Menu**.
6. Repeat for "Footer Menu" if needed.

## 4. Permalinks
1. Go to **Settings > Permalinks**.
2. Select **Post name** (e.g., `https://kidazzle.com/sample-post/`).
3. Click **Save Changes**.

## 5. Page Templates
Ensure your pages are using the correct templates:
- **Home**: Default Template (or `front-page.php` takes precedence automatically)
- **About Us**: Template "About Page"
- **Programs**: Template "Programs Page"
- **Locations**: Template "Locations Page"
- **Contact**: Template "Contact Page"
- **Teacher Portal**: Template "Teacher Portal"

## 6. Recommended Plugins (Optional)
- **Classic Editor**: If you prefer the classic editing experience.
- **Advanced Custom Fields (ACF)**: If you want to make the hardcoded fields dynamic in the future.
