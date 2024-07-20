<?php
require 'config.php';
require 'database.php';
$g_title = BLOG_NAME . ' - Index';
$g_page = 'index';
require 'header.php';
require 'menu.php';

$posts = find_all_blogs(BLOG_INDEX_NUM_POSTS);

?>
<div id="all_blogs">

    <h3>Privacy Policy for Daniel's Blog</h3>

    <p>Welcome to Daniel's Blog! We value your privacy and are committed to protecting your personal information. This
        policy explains how we collect, use, and safeguard your data.</p>

        <div>
    <ol>
        <li>
            <strong>Information We Collect</strong>
            <ul>
                <li>Personal Information: Name, email address, username, comments, and IP address.</li>
                <li>Non-Personal Information: Browser type, operating system, referring site, pages viewed, and time
                    spent on our site.</li>
            </ul>
        </li>
        <li>
            <strong>How We Use Your Information</strong>
            <ul>
                <li>To Provide Services: Manage accounts, respond to comments, and send updates.</li>
                <li>To Improve Our Website: Analyze usage and improve content.</li>
            </ul>
        </li>
        <li>
            <strong>Cookies and Tracking</strong>
            <ul>
                <li>We use cookies to personalize your experience and analyze site traffic. You can control cookies
                    through your browser settings.</li>
                <li>Cookies help us remember your preferences and understand how you interact with our content, which
                    enables us to enhance your browsing experience.</li>
                <li>We also use tracking technologies such as web beacons and pixels to collect information about your
                    interaction with our emails and advertisements.</li>
            </ul>
        </li>
        <li>
            <strong>Data Management and Security</strong>
            <ul>
                <li>We employ a variety of security measures to protect your data from unauthorized access, alteration,
                    disclosure, or destruction.</li>
                <li>Data is stored on secure servers with regular backups and encryption where appropriate.</li>
                <li>Access to personal information is restricted to employees, contractors, and agents who need to know
                    that information to operate, develop, or improve our services.</li>
            </ul>
        </li>
        <li>
            <strong>Your Data Rights</strong>
            <ul>
                <li>You have the right to access, correct, or delete your personal information. Contact us to exercise
                    these rights.</li>
                <li>You can opt out of receiving our communications at any time by following the unsubscribe link in our
                    emails or contacting us directly.</li>
                <li>If you are a resident of the European Economic Area (EEA), you have additional data protection
                    rights under the General Data Protection Regulation (GDPR).</li>
            </ul>
        </li>
        <li>
            <strong>Third-Party Services</strong>
            <ul>
                <li>We may use third-party services for analytics, advertising, and payment processing. These services
                    may collect information about you in accordance with their own privacy policies.</li>
                <li>We are not responsible for the privacy practices of third-party sites or services linked to or from
                    our blog.</li>
            </ul>
        </li>
        <li>
            <strong>Changes to This Privacy Policy</strong>
            <ul>
                <li>We may update our privacy policy from time to time to reflect changes in our practices or legal
                    requirements. We will notify you of any significant changes by posting the new policy on our site
                    and updating the effective date.</li>
            </ul>
        </li>
        <li>
            <strong>Contact Us</strong>
            <ul>
                <li>If you have any questions about this privacy policy or our data practices, please contact us at
                    info@blog.com.</li>
            </ul>
        </li>
    </ol>
</div>

</div>
<?php
require 'footer.php';
?>