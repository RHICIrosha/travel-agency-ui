<?php
$bladePath = resource_path('views/welcome.blade.php');
$content = file_get_contents($bladePath);

// Replace Section 1 Hero texts
$content = str_replace(
    'Sri Lanka\'s Most Trusted Travel Partner',
    '{{ $settings->hero_badge }}',
    $content
);
$content = str_replace(
    "Discover the<br>\n                        <span style=\"color: #facc15; text-shadow: 0 0 60px rgba(250,204,21,0.5), 0 0 20px rgba(250,204,21,0.3);\">Soul of</span><br>\n                        Sri Lanka",
    "{{ \$settings->hero_heading_line1 }}<br>\n                        <span style=\"color: #facc15; text-shadow: 0 0 60px rgba(250,204,21,0.5), 0 0 20px rgba(250,204,21,0.3);\">{{ \$settings->hero_heading_highlight }}</span><br>\n                        {{ \$settings->hero_heading_line2 }}",
    $content
);
$content = str_replace(
    "From misty mountains and ancient kingdoms to pristine beaches and thrilling wildlife safaris, Zenora Travels creates unforgettable journeys designed around your passion for exploration.",
    "{{ \$settings->hero_subtext }}",
    $content
);
$content = str_replace(
    "Plan Your Journey",
    "{{ \$settings->hero_cta_primary_label }}",
    $content
);
$content = str_replace(
    "href=\"/contact\" id=\"hero-plan-journey\"",
    "href=\"{{ \$settings->hero_cta_primary_url }}\" id=\"hero-plan-journey\"",
    $content
);
$content = str_replace(
    "Explore Tours",
    "{{ \$settings->hero_cta_secondary_label }}",
    $content
);
$content = str_replace(
    "href=\"/tours\" id=\"hero-explore-tours\"",
    "href=\"{{ \$settings->hero_cta_secondary_url }}\" id=\"hero-explore-tours\"",
    $content
);
$content = str_replace(
    "1,300+",
    "{{ \$settings->hero_stat1_value }}",
    $content
);
$content = str_replace(
    "Happy Travellers",
    "{{ \$settings->hero_stat1_label }}",
    $content
);
$content = str_replace(
    "4.9 / 5",
    "{{ \$settings->hero_stat2_value }}",
    $content
);
$content = str_replace(
    "Average Rating",
    "{{ \$settings->hero_stat2_label }}",
    $content
);
$content = str_replace(
    "50+",
    "{{ \$settings->hero_stat3_value }}",
    $content
);
$content = str_replace(
    "Curated Routes",
    "{{ \$settings->hero_stat3_label }}",
    $content
);

file_put_contents($bladePath, $content);
echo "Hero replaced\n";
