<?php

return [

    // ── about ──────────────────────────────────────────────────────────────
    'about' => [
        'section_label' => 'About School',
        'heading1'      => 'Private Secondary School',
        'heading2'      => '«Parasat Ақжайық»',
        'intro'         => 'A modern educational institution focused on quality education and the holistic development of every student.',
        'admin_card'    => 'Administration',
        'teachers_card' => 'Our Teachers',
        'contacts_card' => 'Contacts',
        'cat_about'     => '/About Us',
    ],

    // ── administration ─────────────────────────────────────────────────────
    'administration' => [
        'section_label' => 'About School',
        'heading'       => 'School Leadership',
        'intro'         => 'A team of professionals with years of experience in education, building the future of every student.',
        'staff' => [
            ['name' => 'Nurkeshov Baurzhan Buranbaevich',   'role' => 'Principal of «PARASAT» School',                         'photo' => 'images/parasat/user_director.jpeg'],
            ['name' => 'Dosimova Assel Oralbayevna',         'role' => 'Deputy Director for Innovation',                         'photo' => 'images/parasat/user_director_of_innovatory.jpeg'],
            ['name' => 'Sultanova Gaukhar Omarbekovka',      'role' => 'Deputy Director for Academic Affairs',                   'photo' => 'images/parasat/user_director_helper.jpeg'],
            ['name' => 'Orynbasar Gulnara Serikbaikyzы',     'role' => 'Deputy Director for Academic Affairs',                   'photo' => 'images/parasat/user_director_helper2.jpeg'],
            ['name' => 'Myrza­kulov Muslim Kabidullayevich',  'role' => 'Deputy Director for Educational Work',                   'photo' => 'images/parasat/user_director_of_culture.jpeg'],
            ['name' => 'Khamrayeva Maria Imamagzamkyzы',     'role' => 'Deputy Director for Educational Work',                   'photo' => 'images/parasat/user_director_of_culture2.jpeg'],
        ],
    ],

    // ── assessment ─────────────────────────────────────────────────────────
    'assessment' => [
        'section_label' => 'Education',
        'heading'       => 'Assessment Schedule (SA)',
        'intro'         => 'Summative assessment for units and quarters of the 2024–2025 academic year.',
        'bjb_title'     => 'SA for Unit (БЖБ)',
        'bjb_desc'      => 'Summative assessment for a unit — conducted upon completion of each topic / unit of the curriculum.',
        'tjb_title'     => 'SA for Quarter (ТЖБ)',
        'tjb_desc'      => 'Summative assessment for a quarter — final test at the end of each quarter.',
        'col_quarter'   => 'Quarter',
        'col_start'     => 'Start',
        'col_end'       => 'End',
        'quarters' => [
            ['label' => 'Quarter 1', 'start' => '02.09.2024', 'end' => '01.11.2024', 'bjb' => 'October 2024',       'tjb' => '28–31 October 2024'],
            ['label' => 'Quarter 2', 'start' => '11.11.2024', 'end' => '27.12.2024', 'bjb' => 'December 2024',      'tjb' => '23–27 December 2024'],
            ['label' => 'Quarter 3', 'start' => '13.01.2025', 'end' => '21.03.2025', 'bjb' => 'Feb–March 2025',     'tjb' => '17–21 March 2025'],
            ['label' => 'Quarter 4', 'start' => '31.03.2025', 'end' => '23.05.2025', 'bjb' => 'April–May 2025',     'tjb' => '19–23 May 2025'],
        ],
    ],

    // ── cafeteria ──────────────────────────────────────────────────────────
    'cafeteria' => [
        'section_label' => 'Cafeteria',
        'heading'       => 'School Meals',
        'intro'         => 'Full hot meals. The menu is compiled in accordance with SanPin standards and the nutritional needs of children.',
        'schedule_title'=> 'Meal Schedule',
        'menu_title'    => 'Weekly Menu',
        'cta_title'     => 'Meal Costs',
        'cta_desc'      => 'For detailed information on meal costs and subsidies, please contact the school',
        'cta_btn'       => 'Find Out Cost',
        'schedule' => [
            ['Breakfast',         '08:00 – 08:30'],
            ['Lunch (Grades 1–4)', '11:30 – 12:00'],
            ['Lunch (Grades 5–11)','12:30 – 13:00'],
            ['Meals per day',      '3 times'],
            ['Hot food',           'Every day'],
        ],
        'menu' => [
            'Monday'    => ['Oatmeal porridge with butter', 'Borscht, cutlet with mashed potatoes', 'Compote, bread'],
            'Tuesday'   => ['Boiled eggs, bread', 'Chicken soup, rice with meat', 'Tea, fruit'],
            'Wednesday' => ['Pancakes with sour cream', 'Laghman, samsa', 'Kefir, biscuit'],
            'Thursday'  => ['Buckwheat porridge', 'Cabbage soup, plov', 'Compote, bread'],
            'Friday'    => ['Omelette, buttered bread', 'Rice soup, pasta with cheese', 'Tea, fruit'],
        ],
    ],

    // ── clil ───────────────────────────────────────────────────────────────
    'clil' => [
        'section_label' => 'Education',
        'heading1'      => 'Content and Language',
        'heading2'      => 'Integrated Learning',
        'intro'         => 'A methodology where subjects are taught simultaneously in Kazakh, Russian, and English.',
        'cta_title'     => 'Enrol in CLIL Class',
        'cta_desc'      => 'To enrol, contact the school reception or call us',
        'cta_btn'       => 'Enrol',
        'benefits' => [
            ['title' => 'Immersive Language Environment', 'desc' => 'Studying subjects in English develops language skills naturally.'],
            ['title' => 'Critical Thinking',               'desc' => 'Students learn to analyse information in multiple languages simultaneously.'],
            ['title' => 'International Standard',          'desc' => 'Preparation for admission to foreign universities.'],
            ['title' => 'High ENT Results',                'desc' => 'In-depth subject study improves scores on national testing.'],
        ],
    ],

    // ── clubs ──────────────────────────────────────────────────────────────
    'clubs' => [
        'section_label' => 'Education',
        'heading'       => 'Clubs & Activities',
        'intro'         => 'Our school offers clubs and activities in various directions. Every student will find something they enjoy.',
        'categories' => [
            'Sports' => [
                ['Football',    'Mon, Wed, Fri · 15:00–16:30', '/Sports'],
                ['Basketball',  'Tue, Thu · 15:00–16:30',      '/Sports'],
                ['Swimming',    'Sat · 10:00–12:00',           '/Sports'],
                ['Judo',        'Mon, Wed · 16:30–18:00',      '/Sports'],
            ],
            'Arts & Culture' => [
                ['Drawing',  'Tue, Thu · 14:30–16:00',  '/Arts'],
                ['Theatre',  'Fri · 14:00–16:00',        '/Arts'],
                ['Choir',    'Wed · 14:30–15:30',        '/Arts'],
                ['Dance',    'Mon, Fri · 15:00–16:30',  '/Arts'],
            ],
            'Science & Technology' => [
                ['Robotics',     'Tue, Fri · 14:00–15:30', '/STEM'],
                ['Programming',  'Wed, Fri · 14:00–15:30', '/STEM'],
                ['Young Chemist','Thu · 14:00–15:30',      '/STEM'],
                ['Mathematics',  'Mon, Thu · 14:00–15:30', '/STEM'],
            ],
            'Languages' => [
                ['English (Conversational)', 'Mon, Wed · 14:00–15:00', '/Languages'],
                ['Kazakh Language',           'Tue, Thu · 14:00–15:00', '/Languages'],
            ],
        ],
    ],

    // ── contacts ───────────────────────────────────────────────────────────
    'contacts' => [
        'section_label'  => 'Contact Us',
        'heading1'       => 'Contact',
        'heading2'       => 'Information',
        'req_title'      => 'Details',
        'address_label'  => 'Address',
        'address_value'  => 'Shymkent, Akzhayyk district',
        'phone_label'    => 'Phone',
        'email_label'    => 'Email',
        'hours_label'    => 'Working Hours',
        'hours_value'    => "Mon–Fri: 08:00–19:00\nSat: 09:00–13:00",
        'form_title'     => 'Write to Us',
        'form_name'      => 'Your Name',
        'form_email'     => 'Email',
        'form_phone'     => 'Phone',
        'form_message'   => 'Your question or message',
        'form_submit'    => 'Send',
    ],

    // ── curriculum ─────────────────────────────────────────────────────────
    'curriculum' => [
        'section_label' => 'Education',
        'heading'       => 'Curriculum',
        'intro'         => 'Subjects by grade in accordance with the State Educational Standard of the Republic of Kazakhstan.',
        'grades' => [
            'Grades 1–4'  => ['Kazakh Language', 'Russian Language', 'Mathematics', 'World Studies', 'Music', 'Arts & Crafts', 'Physical Education'],
            'Grades 5–9'  => ['Kazakh Language', 'Russian Language', 'English Language', 'Mathematics', 'Physics', 'Chemistry', 'Biology', 'History', 'Geography', 'Computer Science', 'Physical Education'],
            'Grades 10–11'=> ['Kazakh Language', 'Russian Language', 'English Language', 'Algebra & Calculus', 'Geometry', 'Physics', 'Chemistry', 'Biology', 'History of Kazakhstan', 'World History', 'Computer Science', 'Physical Education'],
        ],
    ],

    // ── education ──────────────────────────────────────────────────────────
    'education' => [
        'section_label' => 'Education',
        'heading1'      => '5 Educational',
        'heading2'      => 'Directions',
        'intro'         => 'The educational process is built on state standards with elements of modern educational methods.',
        'sections' => [
            ['title' => 'Curriculum',         'desc' => 'Programmes by grades and subjects',                'route' => 'curriculum',          'label' => '/Study'],
            ['title' => 'Schedule',            'desc' => 'Weekly class schedule',                           'route' => 'schedule',            'label' => '/Study'],
            ['title' => 'CLIL Class',          'desc' => 'Trilingual subject instruction',                  'route' => 'clil',                'label' => '/Study'],
            ['title' => 'Clubs & Activities',  'desc' => 'Extra-curricular education',                      'route' => 'clubs',               'label' => '/Study'],
            ['title' => 'Assessment Schedule', 'desc' => 'Dates of tests and examinations',                 'route' => 'assessment-schedule', 'label' => '/Study'],
            ['title' => 'ENT Results',         'desc' => 'National unified testing outcomes',               'route' => 'ent-results',         'label' => '/Study'],
        ],
    ],

    // ── ent ────────────────────────────────────────────────────────────────
    'ent' => [
        'section_label' => 'Education',
        'heading'       => 'ENT Results',
        'intro'         => 'The Unified National Test is the final certification for graduates. Our students show high results every year.',
        'stat_avg'      => 'Average Score 2024',
        'stat_max'      => 'Maximum Score 2024',
        'stat_grants'   => 'Grants Awarded 2024',
        'stat_grads'    => 'Graduates 2024',
        'table_title'   => 'Statistics by Year',
        'col_year'      => 'Year',
        'col_grads'     => 'Graduates',
        'col_avg'       => 'Average Score',
        'col_max'       => 'Maximum',
        'col_grants'    => 'Grants',
    ],

    // ── faq ────────────────────────────────────────────────────────────────
    'faq' => [
        'section_label' => 'FAQ',
        'heading1'      => 'Frequently Asked',
        'heading2'      => 'Questions',
        'cta_title'     => 'Didn\'t find your answer?',
        'cta_desc'      => 'Write to us — we will reply within one business day',
        'cta_btn'       => 'Ask a Question',
        'categories' => [
            'Admission' => [
                ['How do I enrol at the school?', 'To enrol, visit the school reception with the child\'s documents. We conduct an interview and testing. Registration is done via the form on the website or by phone.'],
                ['What documents are required?', 'Birth certificate (original and copy), medical record (form 026/у), 3×4 photos (6 pcs), family composition certificate, parent/guardian ID document.'],
                ['Are there entrance tests?', 'Yes, tests in Kazakh, Russian and Mathematics are conducted according to the previous grade\'s programme. For Grade 1 — an interview.'],
            ],
            'Studies' => [
                ['How many students are in a class?', 'Class size does not exceed 24 students, allowing individual attention for every child.'],
                ['Is there an after-school programme?', 'Yes, the extended-day group operates until 18:00. Children do homework, attend clubs, and rest.'],
                ['How are tests conducted?', 'Under the state standard, SA for Units (БЖБ) and SA for Quarters (ТЖБ) are held. The schedule is posted on the website under "Education".'],
            ],
            'Organisation' => [
                ['What is the tuition fee?', 'Tuition fees can be clarified at the school reception or by phone. Family discounts are available when multiple children study.'],
                ['Is there a school uniform?', 'Yes, the school has a standardised uniform. Colour and style can be confirmed at the time of enrolment.'],
                ['How do I contact a teacher?', 'Communication with teachers takes place via the electronic diary, phone or in-person during reception hours.'],
            ],
        ],
    ],

    // ── news ───────────────────────────────────────────────────────────────
    'news' => [
        'section_label' => 'News',
        'heading1'      => 'Latest Events',
        'heading2'      => '',
        'intro'         => 'Follow student achievements and important announcements from Parasat Ақжайық school.',
        'filters'       => ['All', 'Events', 'Studies', 'Sports', 'Achievements'],
        'read_more'     => 'Read more →',
        'items' => [
            [
                'cat'     => 'Events',
                'title'   => '«No to Violence»: Legal Awareness Session for Students',
                'date'    => '2025',
                'excerpt' => 'A seminar titled "No to Violence: Legal Responsibility and Protection Mechanisms" was held at the school. A juvenile police officer from the Abai District Police Department of Shymkent, Senior Lieutenant R. Smatilla, explained types of violence, including stalking, personal boundary violations, legal consequences, and ways to protect one\'s rights.',
                'photo'   => 'images/parasat/article1.jpeg',
            ],
            [
                'cat'     => 'Events',
                'title'   => 'Documentary Film «Zakladchiki Mat» Screened for Students',
                'date'    => '2025',
                'excerpt' => 'Coordinated by the General Prosecutor\'s Office of Kazakhstan, the documentary «Zakladchiki Mat» was screened for students. The film illustrated the severe consequences of drug crime for society, families and individuals, as well as the legal responsibility for drug-courier activities.',
                'photo'   => 'images/parasat/article2.jpeg',
            ],
            [
                'cat'     => 'Achievements',
                'title'   => 'Alim Aibyr Wins 1st Place at the Republican «Zerde» Competition!',
                'date'    => '31 January 2026',
                'excerpt' => 'Alim Aibyr Azamatuly won 1st place at the republican stage of the «Zerde» science project competition! Project title: "SmartEco: Concept of an Autonomous Eco-Home". Scientific supervisor: Bimuratova Bibinur. The republican stage was held at the «Baldauiren» REC in Shchuchinsk (28.01–31.01.2026).',
                'photo'   => 'images/parasat/article3.jpeg',
            ],
        ],
    ],

    // ── schedule ───────────────────────────────────────────────────────────
    'schedule' => [
        'section_label' => 'Education',
        'heading'       => 'Class Schedule',
        'intro'         => 'Select a grade to view the schedule for the current week.',
        'class_suffix'  => '',
        'days'          => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
        'update_note'   => '* Schedule is updated by the school administration',
    ],

    // ── teachers ───────────────────────────────────────────────────────────
    'teachers' => [
        'section_label' => 'Teaching Staff',
        'heading'       => 'Experienced Educators',
        'intro'         => 'Highly qualified specialists, passionate about their work and dedicated to every child.',
        'cat_label'     => '/Teachers',
        'subjects' => [
            'Kazakh Language & Literature',
            'Russian Language & Literature',
            'English Language',
            'Mathematics',
            'Physics',
            'Chemistry',
            'Biology',
            'History of Kazakhstan',
            'World History',
            'Geography',
            'Computer Science',
            'Physical Education',
            'Music',
            'Fine Arts',
            'Primary School',
        ],
    ],

    // ── vacancies ──────────────────────────────────────────────────────────
    'vacancies' => [
        'section_label'   => 'Vacancies',
        'heading1'        => 'Join',
        'heading2'        => 'Our Team',
        'intro'           => 'We are always glad to welcome talented teachers and specialists ready to grow with us.',
        'lbl_employment'  => 'Employment:',
        'lbl_edu'         => 'Education:',
        'lbl_salary'      => 'Salary:',
        'badge_urgent'    => 'Urgent',
        'apply_btn'       => 'Apply',
        'cta_title'       => 'Didn\'t find a suitable vacancy?',
        'cta_desc'        => 'Send your CV — we will contact you when a suitable position opens',
        'cta_btn'         => 'Send CV',
        'items' => [
            ['title' => 'Mathematics Teacher (Grades 10–11)', 'type' => 'Full-time', 'edu' => 'Higher pedagogical education',           'salary' => 'By agreement', 'urgent' => true],
            ['title' => 'English Language Teacher',            'type' => 'Full-time', 'edu' => 'Higher education, C1+ level',           'salary' => 'By agreement', 'urgent' => true],
            ['title' => 'Teacher-Organiser',                  'type' => 'Full-time', 'edu' => 'Higher pedagogical education',           'salary' => 'By agreement', 'urgent' => false],
            ['title' => 'After-school Tutor',                 'type' => 'Full-time', 'edu' => 'Secondary / higher pedagogical',         'salary' => 'By agreement', 'urgent' => false],
            ['title' => 'Support Staff',                      'type' => 'Full-time', 'edu' => 'Not required',                          'salary' => 'By agreement', 'urgent' => false],
        ],
    ],


    // ── index ──────────────────────────────────────────────────────────────
    'index' => [
        'banner_title'     => "School\nParasat Ақжайық",
        'banner_paragraph' => 'A new generation private school in Shymkent — nurturing responsible, creative and innovative personalities',

        'about_label'   => 'About School',
        'about_heading' => "Education is\nan investment in the future\nof every child",
        'thumb_classes' => 'Classrooms',
        'thumb_campus'  => 'Campus',
        'thumb_library' => 'Library',
        'thumb_steam'   => 'STEAM Cabinet',

        'dirs_heading'   => '5 Educational Directions',
        'dirs_paragraph' => 'Our school develops students in five key directions, shaping a well-rounded individual ready for the challenges of the modern world.',
        'dirs' => [
            'dir1' => ['tab' => 'Subject Skills', 'label' => 'Subject',     'items' => ['Mathematics & Exact Sciences', 'Natural Sciences', 'Languages & Humanities']],
            'dir2' => ['tab' => 'Core Skills',    'label' => 'Core',        'items' => ['Financial Literacy', 'Media Literacy', 'Entrepreneurial Thinking']],
            'dir3' => ['tab' => 'Soft-skills',    'label' => 'Soft-skills', 'items' => ['Communication & Leadership', 'Critical Thinking', 'Emotional Intelligence']],
            'dir4' => ['tab' => 'STEM Digital',   'label' => 'STEM',        'items' => ['Programming', 'Robotics', 'Computer Graphics']],
            'dir5' => ['tab' => 'Values',         'label' => 'Values',      'items' => ['Global Citizenship', 'Environmental Responsibility', 'Cultural Diversity']],
        ],

        'faculty_label'    => 'Teaching Staff',
        'faculty_h1'       => 'Our experienced teachers',
        'faculty_h2'       => 'help students unlock',
        'faculty_h3'       => 'their potential',
        'faculty1_cat'     => 'Primary School',
        'faculty1_title'   => 'Primary School Teachers',
        'faculty1_para'    => 'Our primary school teachers create a warm and supportive environment where every child feels confident and ready for new discoveries.',
        'faculty2_cat'     => 'Middle & High School',
        'faculty2_title'   => 'Subject Teachers',
        'faculty2_para'    => 'Highly qualified specialists in mathematics, natural sciences, languages and humanities prepare students for successful UNT results and university admission.',
        'all_teachers_btn' => 'All Teachers',

        'counter1_num'   => '1500',
        'counter1_title' => 'Students',
        'counter1_para'  => 'The school enrols students from grades 1 to 11 and creates conditions for the holistic development of each one.',
        'counter2_num'   => '100',
        'counter2_title' => 'Teachers',
        'counter2_para'  => 'Qualified educators with experience who have completed modern professional development programmes.',
        'counter3_num'   => '80',
        'counter3_title' => 'Classrooms',
        'counter3_para'  => 'Modern classrooms, laboratories, STEAM spaces and 2 sports halls equipped with state-of-the-art facilities.',

        'campus_label' => 'School Life',
        'campus_h1'    => 'School is —',
        'campus_h2'    => 'the best time',
        'campus_h3'    => 'of your life.',
        'campus_para'  => 'A modern campus, equipped laboratories, sports halls and a friendly atmosphere — everything so that every student can unlock their potential.',

        'news1_h1'   => 'School',
        'news1_h2'   => 'News',
        'news1_para' => 'Follow the latest events, student achievements and important announcements from Parasat Ақжайық school.',
        'news1_items' => [
            ['title' => 'Parasat School students won the city mathematics olympiad',       'para' => 'The school team took first place in three categories of the city olympiad, demonstrating a high level of preparation.'],
            ['title' => 'Opening of the new STEAM cabinet: robotics and programming',      'para' => 'The school held a grand opening of the modern STEAM cabinet, equipped with robotics and 3D modelling equipment.'],
            ['title' => 'Open Day: we invite future first-graders',                        'para' => 'Parasat Ақжайық school invites parents and children to an open day. Meet our teachers and see the learning spaces.'],
            ['title' => 'UNT 2024 results: 95% of graduates admitted to universities',    'para' => 'Parasat school graduates showed high UNT results — 95% successfully enrolled in universities in Kazakhstan and abroad.'],
        ],

        'strategy_label'  => 'Development Strategy',
        'strategy_h1'     => 'Our strategy —',
        'strategy_h2'     => 'nurturing the leaders',
        'strategy_h3'     => 'of tomorrow',
        'strategy_cat'    => 'Strategy 2025–2030',
        'strategy_title'  => 'Quality. Innovation. Personality.',
        'strategy_para1'  => 'Parasat Ақжайық school builds education on three strategic pillars: high quality academic preparation, introduction of modern technologies and STEM approaches, and nurturing a socially responsible, proactive personality.',
        'strategy_para2'  => 'Our graduates are world citizens ready to study at leading universities in Kazakhstan and abroad, equipped with critical thinking, leadership qualities and respect for cultural diversity.',
        'strategy_btn'    => 'Learn more about the strategy',

        'reviews_label'       => 'Reviews',
        'reviews_heading'     => 'Students',
        'reviews_heading_alt' => 'students',
        'reviews' => [
            ['quote' => 'Currently the faculty has five departments: the Department of Geography and Ecology.', 'name' => 'Guy Hawkins', 'role' => 'Student'],
            ['quote' => 'Currently the faculty has five departments: the Department of Geography and Ecology.', 'name' => 'Wade Warren', 'role' => 'Student'],
            ['quote' => 'Currently the faculty has five departments: the Department of Geography and Ecology.', 'name' => 'Wade Warren', 'role' => 'Student'],
        ],

        'events_label' => 'Extracurricular Activities',
        'events_h1'    => 'Clubs and',
        'events_h2'    => 'additional classes',
        'events_time'  => 'Mon–Fri 15:00–17:00',
        'events_tabs' => [
            'sport'   => ['tab' => 'Sport',    'items' => [
                ['title' => 'Football Section', 'para' => 'Football training for students of all grades. Participation in city and inter-school tournaments.'],
                ['title' => 'Basketball',       'para' => 'Team training, developing coordination and team spirit on a professional court.'],
                ['title' => 'Volleyball',       'para' => 'Section for volleyball enthusiasts — from basic techniques to competitions.'],
                ['title' => 'Athletics',        'para' => 'Running, jumping and throwing. Individual preparation for school and city competitions.'],
            ]],
            'art'     => ['tab' => 'Art',     'items' => [
                ['title' => 'Painting & Drawing',  'para' => 'Learning drawing techniques from sketch to completed oil or watercolour painting.'],
                ['title' => 'Sculpture',            'para' => 'Creating three-dimensional compositions from clay and other materials.'],
                ['title' => 'Computer Graphics',    'para' => 'Digital art: working in graphic editors and creating illustrations.'],
                ['title' => 'Photography',          'para' => 'Basics of photo composition, working with a camera and editing photos.'],
            ]],
            'stem'    => ['tab' => 'STEM',    'items' => [
                ['title' => 'Robotics',       'para' => 'Building and programming robots on the Arduino and LEGO Mindstorms platform.'],
                ['title' => 'Programming',    'para' => 'Learning Python and Scratch. Creating games, apps and algorithms.'],
                ['title' => 'Electronics',    'para' => 'Creating simple electrical circuits, getting acquainted with components and soldering.'],
                ['title' => '3D Modelling',   'para' => 'Designing objects in Tinkercad and Fusion 360, printing on a 3D printer.'],
            ]],
            'cooking' => ['tab' => 'Cooking', 'items' => [
                ['title' => 'National Cuisine',    'para' => 'Learning traditional Kazakh dishes, history of culinary traditions of Kazakhstan\'s peoples.'],
                ['title' => 'Baking & Desserts',   'para' => 'Cakes, cookies, eastern sweets — from recipe to decorating the finished dish.'],
                ['title' => 'Healthy Eating',      'para' => 'Preparing healthy dishes, basics of nutrition science and proper diet.'],
                ['title' => 'World Cuisine',       'para' => 'Dishes from different countries: Italian, Japanese, French cuisine.'],
            ]],
            'music'   => ['tab' => 'Music',   'items' => [
                ['title' => 'Guitar',   'para' => 'Learning to play acoustic and classical guitar for beginners and continuing students.'],
                ['title' => 'Piano',    'para' => 'Piano lessons: musical notation, performance technique, concert practice.'],
                ['title' => 'Vocals',   'para' => 'Voice training, solo and choral singing, participation in school concerts.'],
                ['title' => 'Dombra',   'para' => 'Learning the traditional Kazakh instrument, folk repertoire.'],
            ]],
            'theatre' => ['tab' => 'Theatre', 'items' => [
                ['title' => 'Acting',             'para' => 'Basics of stage movement, character portrayal and working with text.'],
                ['title' => 'Stage Speech',       'para' => 'Diction, breathing, rhetoric. Confident performance before an audience.'],
                ['title' => 'Productions & Plays','para' => 'Participation in school productions and theatre festivals.'],
                ['title' => 'Scenography',        'para' => 'Creating sets and costumes for school plays.'],
            ]],
            'dance'   => ['tab' => 'Dance',   'items' => [
                ['title' => 'Folk Dances',    'para' => 'Kazakh and eastern folk dances — history, culture, performance technique.'],
                ['title' => 'Modern Dance',   'para' => 'Hip-hop, jazz, contemporary: developing flexibility and rhythm.'],
                ['title' => 'Choreography',   'para' => 'Basics of classical choreography and ballet gymnastics.'],
                ['title' => 'Break-dance',    'para' => 'Dynamic street-dance for active students in grades 5–11.'],
            ]],
        ],

        'news2_heading' => 'News &amp; Articles',
        'news2_para'    => 'Explore 10+ university courses in various specialisations that stimulate intellectual and intuitive learning.',
        'news2_badge'   => 'Bachelor\'s',
        'news2_items'   => [
            'Wildfire smoke reduces student academic performance',
            'Class of 2023: explore and engage',
            'Research in battery technology',
            'Wildfire smoke reduces student academic performance',
            'Wildfire smoke reduces student academic performance',
        ],

        'adv_label' => 'Our Advantages',
        'adv_h1'    => 'Opportunities',
        'adv_h2'    => 'of our school',
        'adv_items' => [
            ['title' => 'Face ID security system',             'label' => 'Security'],
            ['title' => 'CLIL class — bilingual education',    'label' => 'Education'],
            ['title' => 'In-depth UNT preparation',            'label' => 'UNT'],
            ['title' => 'Free meals for grades 1–4',           'label' => 'Nutrition'],
        ],
    ],

];
