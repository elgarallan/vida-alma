<?php
/**
 * Site content. Edit text here rather than in the page templates.
 */

// The six areas of work. Used for the strip on the Home page and the sections on Our Work.
// 'text' is the one-line summary; 'intro', 'body' and 'points' appear on Our Work.
$PILLARS = [
    'community-empowerment' => [
        'title'  => 'Community Empowerment',
        'icon'   => 'people',
        'color'  => 'terracotta',
        'scene'  => 'terracotta',
        'text'   => 'Educational sessions and skills-development activities.',
        'intro'  => 'Helping people build the knowledge and skills to shape their own future.',
        'body'   => 'We run educational sessions and skills-development activities that give children, young people and adults practical tools for school, work and everyday life. Our aim is self-sufficiency: support that keeps making a difference long after a session ends.',
        'points' => ['Educational sessions', 'Skills-development activities', 'Learning opportunities for all ages'],
    ],
    'environmental-sustainability' => [
        'title'  => 'Environmental Sustainability',
        'icon'   => 'recycle',
        'color'  => 'teal',
        'scene'  => 'teal',
        'text'   => 'Community cleanups, recycling drives and waste-reduction campaigns.',
        'intro'  => 'Caring for the places we call home, one cleanup at a time.',
        'body'   => 'We organize community cleanups, recycling drives and waste-reduction campaigns that bring neighbours together to protect their surroundings. Along the way, we help build everyday habits that keep communities clean, healthy and sustainable.',
        'points' => ['Community cleanups', 'Recycling drives', 'Waste-reduction campaigns'],
    ],
    'partnership-development' => [
        'title'  => 'Partnership Development',
        'icon'   => 'handshake',
        'color'  => 'olive',
        'scene'  => 'olive',
        'text'   => 'Building relationships with businesses, schools, nonprofits and community groups.',
        'intro'  => 'Doing more, together.',
        'body'   => 'We build lasting relationships with businesses, educational institutions, nonprofit organizations and community groups. Our partners help us reach more people, share resources and skills, and turn good ideas into real action on the ground.',
        'points' => ['Businesses and sponsors', 'Schools and universities', 'Nonprofits and community groups'],
    ],
    'fund-raising' => [
        'title'  => 'Fund Raising',
        'icon'   => 'jar',
        'color'  => 'sun',
        'scene'  => 'sun',
        'text'   => 'Garage sales, bake sales and sponsored events.',
        'intro'  => 'Turning community spirit into resources for those who need them.',
        'body'   => 'From garage sales and bake sales to sponsored events, our fundraising is simple, local and fun to be part of. The funds we raise power our donation drives, outreach and community projects.',
        'points' => ['Garage sales', 'Bake sales', 'Sponsored events'],
    ],
    'direct-service' => [
        'title'  => 'Direct Service',
        'icon'   => 'box',
        'color'  => 'terracotta',
        'scene'  => 'terracotta',
        'text'   => 'Donation drives and regular outreach with community partners.',
        'intro'  => 'Bringing help straight to the people who need it.',
        'body'   => 'Through donation drives and regular outreach with our community partners, we deliver essentials directly to underserved children, families, senior citizens and other vulnerable groups, always with care and respect for the people we serve.',
        'points' => ['Donation drives', 'Regular community outreach', 'Resource distribution with partners'],
    ],
    'long-term-development' => [
        'title'  => 'Long-term Development',
        'icon'   => 'sprout',
        'color'  => 'olive',
        'scene'  => 'olive',
        'text'   => 'Recurring projects, partnerships and transparent reporting.',
        'intro'  => 'Building progress that lasts beyond a single day.',
        'body'   => 'Real change takes time. We commit to recurring projects and ongoing partnerships so communities can keep growing, and we report openly on our work so supporters and partners can see exactly where their help goes.',
        'points' => ['Recurring projects', 'Ongoing partnerships', 'Transparent reporting'],
    ],
];

$VALUES = [
    ['title' => 'Act today', 'text' => 'Need doesn\'t wait, so neither do we. We favour small steps taken now over perfect plans for later.'],
    ['title' => 'Walk together', 'text' => 'We work with communities, not for them. The people closest to a problem help shape the answer.'],
    ['title' => 'Care for the whole', 'text' => 'People and planet are connected. Our work looks after both.'],
    ['title' => 'Stay open', 'text' => 'We share where our money goes and what we learn, including what didn\'t work.'],
];

$TEAM = [
    ['name' => 'Calista Quisumbing',   'role' => 'Founder & Director', 'tone' => 'terracotta'],
    ['name' => 'Ariz Dela Rosa',  'role' => 'Logistics',      'tone' => 'olive'],
    ['name' => 'Ara Apato',     'role' => 'Research', 'tone' => 'teal'],
    ['name' => 'Erin Kawpeng',   'role' => 'Creatives',  'tone' => 'sun'],
    ['name' => 'Tati Mengullo',  'role' => 'Marketing',  'tone' => 'teal'],
    ['name' => 'Anant Sharma',   'role' => 'Public Relations', 'tone' => 'terracotta'],
    ['name' => 'Ryo Araki',      'role' => 'Operations', 'tone' => 'sun'],
    ['name' => 'James Vinoya',   'role' => 'Finance',    'tone' => 'olive'],
];

$COMMITTEE = [
    ['name' => 'Antonio Cornejo', 'role' => 'Logistics Manager',  'tone' => 'olive'],
    ['name' => 'Aica Lagamia',    'role' => 'Creatives Manager',  'tone' => 'sun'],
    ['name' => 'Xavi Kwok',       'role' => 'Marketing Manager',  'tone' => 'teal'],
    ['name' => 'Marga Vedar',     'role' => 'Operations Manager', 'tone' => 'terracotta'],
];

// News stories for the Updates page. Empty until the first update is published.
// Each story: slug, title, date (YYYY-MM-DD), category (an area title), scene, excerpt, body (list of paragraphs).
$POSTS = [];

// Home page FAQ. Each answer is a list of paragraphs.
// {email}, {instagram} and {facebook} become links to the official channels.
$FAQS = [
    [
        'q' => 'What is Vida Alma?',
        'a' => ['Vida Alma is a youth-led, non-profit organization dedicated to human welfare and community empowerment. We bring people together to address community needs through humanitarian service, donation drives, volunteer opportunities, and collaborative initiatives.'],
    ],
    [
        'q' => 'Why was Vida Alma established?',
        'a' => ['Vida Alma was established out of the belief that compassion should lead to action and that serving others should be a sustained commitment rather than a one-time effort. We want to create opportunities for people to contribute meaningfully while helping underserved communities access the resources and support they need.'],
    ],
    [
        'q' => 'Is Vida Alma a long-term initiative?',
        'a' => ['Yes. Vida Alma is intended to be a long-term commitment to community service and sustainable community development. While individual projects may address immediate needs, our broader goal is to develop consistent initiatives, build meaningful partnerships, and promote lasting growth within the communities we work with. We aim to grow responsibly and sustainably according to our resources, experience, and the evolving needs of the people we support.'],
    ],
    [
        'q' => 'Who does Vida Alma serve?',
        'a' => ['We aim to support underserved children, low-income families, senior citizens, unemployed individuals, and other communities experiencing social or economic barriers. Our initiatives will be guided by identified needs, available resources, and opportunities to work with responsible community partners. We hope to reach communities across Metro Manila and, as our capacity and partnerships develop, extend our work to other parts of the Philippines.'],
    ],
    [
        'q' => 'What initiatives does Vida Alma undertake?',
        'a' => ['Our initiatives may include donation drives, the distribution of essential goods, fundraising, volunteer activities, humanitarian outreach, community development projects, and environmental initiatives. As the organization grows, we hope to establish more consistent programs shaped by the needs and experiences of the communities we serve.'],
    ],
    [
        'q' => 'What donations are accepted?',
        'a' => [
            'Accepted donations will depend on the needs of each project. These may include monetary contributions, non-perishable food, hygiene products, clothing and footwear in good condition, educational materials, and other essential supplies. We may also accept project-specific materials for environmental and community initiatives.',
            'Specific requirements will be announced before each drive to help ensure that contributions are appropriate, useful, and responsibly distributed.',
        ],
    ],
    [
        'q' => 'How will donations be used?',
        'a' => ['Donations will support the stated needs and activities of each initiative, including essential supplies, outreach expenses, and approved project costs. We are committed to transparency and accountability by documenting expenditures, communicating how contributions are used, and providing appropriate records or reports to donors and sponsors. We believe that the responsible management of every contribution is essential to earning and maintaining public trust.'],
    ],
    [
        'q' => 'Can I volunteer or partner with Vida Alma?',
        'a' => ['Yes. We welcome individuals, student groups, organizations, and potential partners who share our ideals of compassion, responsible community service, and making a positive impact, even if their specific visions or approaches differ from ours. Depending on the initiative, volunteers may help prepare supplies, organize activities, assist with outreach, or contribute relevant skills. Partnership and volunteer opportunities will be announced through our official channels.'],
    ],
    [
        'q' => 'How can I support Vida Alma?',
        'a' => ['You can contribute by donating goods or funds, volunteering, sponsoring a project, exploring a partnership, or sharing our initiatives with others. Support does not always have to be financial; time, skills, connections, and consistent participation can also help strengthen our work.'],
    ],
    [
        'q' => 'How can I stay updated or get in touch?',
        'a' => ['Follow our official social media accounts on {instagram} and {facebook} for announcements, project updates, volunteer opportunities, and information on how to contribute. For inquiries about donations, partnerships, or upcoming initiatives, contact us through our official channels or email {email}.'],
    ],
];

/** Escape an FAQ answer and turn {email}, {instagram} and {facebook} into links. */
function faq_text(string $text): string
{
    $links = ['{email}' => '<a href="mailto:' . e(SITE_EMAIL) . '">' . e(SITE_EMAIL) . '</a>'];
    foreach (SOCIAL_LINKS as $name => $social) {
        $links['{' . strtolower($name) . '}'] = '<a href="' . e($social['url']) . '" target="_blank" rel="noopener">' . e($name) . '</a>';
    }
    return strtr(e($text), $links);
}

function find_post(array $posts, string $slug): ?array
{
    foreach ($posts as $post) {
        if ($post['slug'] === $slug) {
            return $post;
        }
    }
    return null;
}
