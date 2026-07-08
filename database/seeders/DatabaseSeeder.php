<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Skill;
use App\Models\ResumeItem;
use App\Models\Achievement;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Admin User
        User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Abdullah Fayed',
                'password' => Hash::make('password'),
            ]
        );

        // 2. Seed Settings
        $settings = [
            'hero_title' => 'Abdullah Fayed',
            'hero_subtitle' => 'Software Engineer & Agentic AI Developer',
            'hero_summary' => "Currently, I work at AI MicroMind, where I design and deploy AI agents, implement semantic search with vector databases, and ship full-stack ML applications that turn innovative ideas into deployed solutions.\n\nI'm also pursuing a B.Sc. in Artificial Intelligence at Mansoura University while contributing to the AI community through mentoring, competitive programming, and collaborative engineering work.",
            'about_summary' => 'AI and ML Engineer at AI MicroMind specializing in agentic workflows, RAG systems, and scalable API development. I design and deploy production-grade AI agents that automate complex tasks and deliver actionable insights. Currently pursuing B.Sc. in Artificial Intelligence at Mansoura University (Very Good grade) while mentoring at CIS Team MU and contributing to competitive programming and open-source development.',
            'phone' => '+20 1550930778',
            'email' => 'abdallahfayed@std.mans.edu.eg',
            'location' => 'Cairo, Egypt',
            'linkedin' => 'https://linkedin.com/in/abdullah-fayed',
            'github' => 'https://github.com/abdullahfayed6',
            'meta_title' => 'Abdullah Fayed | AI & ML Engineer Portfolio',
            'meta_description' => 'Abdullah Fayed is an AI & ML engineer building agentic workflows, RAG systems, and data-driven products. Explore projects, experience, and contact details.',
            'meta_keywords' => 'Abdullah Fayed, AI engineer, machine learning, RAG, LangChain, Python, FastAPI, portfolio, Cairo Egypt',
            'cv_file' => 'assets/resume/cv.pdf',
            'typed_items' => 'Software Engineer, ML Researcher, Agentic AI Developer, Data Scientist',
        ];

        foreach ($settings as $key => $value) {
            Setting::set($key, $value);
        }

        // 3. Seed Projects
        $projects = [
            [
                'title' => 'MentorLink',
                'category' => 'AI Platform',
                'description' => 'AI-powered mentorship platform matching mentors and mentees with RAG-driven, personalized recommendations.',
                'image' => 'assets/img/portfolio/mentorlink-mockup.png',
                'github_url' => 'https://github.com/abdullahfayed6/MentorLink',
                'project_url' => 'https://github.com/abdullahfayed6/MentorLink',
                'role' => 'AI Backend & RAG Engineering',
                'project_date' => 'Jul 2025 - Sept 2025',
                'key_features' => [
                    [
                        'title' => 'RAG-Powered Recommendations',
                        'description' => 'Contextual mentor suggestions based on curated knowledge bases and vector search.',
                        'icon' => 'bi-check-circle-fill'
                    ],
                    [
                        'title' => 'Low-Latency APIs',
                        'description' => 'FastAPI services optimized for sub-80ms response times.',
                        'icon' => 'bi-shield-check'
                    ],
                    [
                        'title' => 'Scalable Infrastructure',
                        'description' => 'Dockerized deployment and service orchestration for stability under load.',
                        'icon' => 'bi-graph-up'
                    ],
                    [
                        'title' => 'Personalized Learning Paths',
                        'description' => 'AI-generated learning plans with 90%+ relevance to user goals.',
                        'icon' => 'bi-gear'
                    ]
                ]
            ],
            [
                'title' => 'Notq',
                'category' => 'AI Platform',
                'description' => 'Arabic speech-therapy platform with real-time pronunciation feedback, guided exercises, and progress tracking.',
                'image' => 'assets/img/portfolio/notq.png',
                'github_url' => 'https://github.com/Notq-app/Notq-AI',
                'project_url' => 'https://github.com/Notq-app/Notq-AI',
                'role' => 'AI & Speech Integration',
                'project_date' => 'Aug 2025 - Oct 2025',
                'key_features' => [
                    [
                        'title' => 'Real-time Pronunciation Feedback',
                        'description' => 'AI models detecting phonetic differences in Arabic pronunciation.',
                        'icon' => 'bi-check-circle-fill'
                    ],
                    [
                        'title' => 'Speech Integration',
                        'description' => 'Custom speech-to-text algorithms optimized for childhood speech patterns.',
                        'icon' => 'bi-gear'
                    ]
                ]
            ],
            [
                'title' => 'Customer Churn Prediction',
                'category' => 'ML App',
                'description' => 'ML model for telecom churn prediction with 90%+ accuracy and clear risk segmentation.',
                'image' => 'assets/img/portfolio/Churn.png',
                'github_url' => 'https://github.com/abdullahfayed6/Telco-Churn-Classification',
                'project_url' => 'https://github.com/abdullahfayed6/Telco-Churn-Classification',
                'role' => 'Lead Data Scientist',
                'project_date' => 'Jun 2025 - Jul 2025',
                'key_features' => [
                    [
                        'title' => 'XGBoost Classification',
                        'description' => 'High-accuracy churn classification using tree-based ensemble methods.',
                        'icon' => 'bi-check-circle-fill'
                    ],
                    [
                        'title' => 'Streamlit Interface',
                        'description' => 'Interactive web interface for predictions on individual or batch customers.',
                        'icon' => 'bi-gear'
                    ]
                ]
            ],
            [
                'title' => 'Stroke Risk Prediction',
                'category' => 'ML App',
                'description' => 'Healthcare ML app estimating stroke risk from patient data with 95% accuracy.',
                'image' => 'assets/img/portfolio/stroke.jpg',
                'github_url' => 'https://github.com/abdullahfayed6/Stroke-Risk-Prediction',
                'project_url' => 'https://github.com/abdullahfayed6/Stroke-Risk-Prediction',
                'role' => 'ML Engineer',
                'project_date' => 'May 2025 - Jun 2025',
                'key_features' => [
                    [
                        'title' => 'Model Training',
                        'description' => 'Pipeline for patient stroke risk scoring using advanced classification algorithms.',
                        'icon' => 'bi-check-circle-fill'
                    ],
                    [
                        'title' => 'Web Application',
                        'description' => 'User-friendly dashboard for medical practitioners to run automated patient assessments.',
                        'icon' => 'bi-gear'
                    ]
                ]
            ],
            [
                'title' => 'Smart Contract Assistant',
                'category' => 'AI Platform',
                'description' => 'Upload contracts and chat with citation-grounded answers through a contract analysis assistant with document indexing and evaluation workflows.',
                'image' => 'assets/img/portfolio/smart-contract-assistant.png',
                'github_url' => 'https://github.com/abdullahfayed6/Smart-Contract-Assistant',
                'project_url' => 'https://github.com/abdullahfayed6/Smart-Contract-Assistant',
                'role' => 'RAG Architect',
                'project_date' => 'Oct 2025 - Nov 2025',
                'key_features' => [
                    [
                        'title' => 'Document Q&A',
                        'description' => 'Citation-grounded answers generated from custom-uploaded contracts.',
                        'icon' => 'bi-check-circle-fill'
                    ],
                    [
                        'title' => 'Semantic Search',
                        'description' => 'Embeddings and vector database integration for fast passage retrieval.',
                        'icon' => 'bi-gear'
                    ]
                ]
            ]
        ];

        foreach ($projects as $proj) {
            Project::updateOrCreate(
                ['title' => $proj['title']],
                $proj
            );
        }

        // 4. Seed Skills
        $skills = [
            ['category' => 'Languages', 'name' => 'Python'],
            ['category' => 'Languages', 'name' => 'C++'],
            ['category' => 'Languages', 'name' => 'SQL'],
            ['category' => 'Languages', 'name' => 'TypeScript'],

            ['category' => 'AI Frameworks & Libraries', 'name' => 'FastAPI'],
            ['category' => 'AI Frameworks & Libraries', 'name' => 'Streamlit'],
            ['category' => 'AI Frameworks & Libraries', 'name' => 'Tkinter'],
            ['category' => 'AI Frameworks & Libraries', 'name' => 'scikit-learn'],
            ['category' => 'AI Frameworks & Libraries', 'name' => 'PyTorch'],
            ['category' => 'AI Frameworks & Libraries', 'name' => 'TensorFlow'],
            ['category' => 'AI Frameworks & Libraries', 'name' => 'XGBoost'],
            ['category' => 'AI Frameworks & Libraries', 'name' => 'LangChain'],
            ['category' => 'AI Frameworks & Libraries', 'name' => 'LangSmith'],
            ['category' => 'AI Frameworks & Libraries', 'name' => 'pandas'],
            ['category' => 'AI Frameworks & Libraries', 'name' => 'NumPy'],
            ['category' => 'AI Frameworks & Libraries', 'name' => 'Matplotlib'],

            ['category' => 'Tools & Platforms', 'name' => 'Git'],
            ['category' => 'Tools & Platforms', 'name' => 'GitHub'],
            ['category' => 'Tools & Platforms', 'name' => 'Docker'],
            ['category' => 'Tools & Platforms', 'name' => 'Linux'],
            ['category' => 'Tools & Platforms', 'name' => 'Pinecone'],
            ['category' => 'Tools & Platforms', 'name' => 'FAISS'],
            ['category' => 'Tools & Platforms', 'name' => 'MLflow'],
            ['category' => 'Tools & Platforms', 'name' => 'Optuna'],
            ['category' => 'Tools & Platforms', 'name' => 'VS Code'],
            ['category' => 'Tools & Platforms', 'name' => 'Jupyter'],
            ['category' => 'Tools & Platforms', 'name' => 'Colab'],
            ['category' => 'Tools & Platforms', 'name' => 'CLion'],
            ['category' => 'Tools & Platforms', 'name' => 'Azure TTS'],
            ['category' => 'Tools & Platforms', 'name' => 'OpenAI API'],

            ['category' => 'Concepts', 'name' => 'Machine Learning'],
            ['category' => 'Concepts', 'name' => 'Deep Learning'],
            ['category' => 'Concepts', 'name' => 'Data Analysis'],
            ['category' => 'Concepts', 'name' => 'Retrieval-Augmented Generation (RAG) & Semantic Search'],
            ['category' => 'Concepts', 'name' => 'Prompt Engineering & AI Agents'],
            ['category' => 'Concepts', 'name' => 'API Design'],
            ['category' => 'Concepts', 'name' => 'CI/CD'],
            ['category' => 'Concepts', 'name' => 'MLOps'],
            ['category' => 'Concepts', 'name' => 'Model Evaluation & Feature Engineering'],
            ['category' => 'Concepts', 'name' => 'Data Structures & Algorithms'],
            ['category' => 'Concepts', 'name' => 'OOP'],
        ];

        foreach ($skills as $skill) {
            Skill::updateOrCreate(
                ['category' => $skill['category'], 'name' => $skill['name']],
                $skill
            );
        }

        // 5. Seed Resume Items
        $resumeItems = [
            [
                'section' => 'experience',
                'title' => 'Agentic AI Developer',
                'subtitle' => 'Nov 2025 - Present',
                'institution' => 'AI MicroMind · Hybrid',
                'description' => "Contribute across both MicroMind Core and MicroMind MicroApps through product engineering, workflow tooling, and applied AI research.\nAt MicroMind Core, design AI-driven business solutions and workflow integrations, build native workflow extensions such as the LarkSpaceDrive Native Node, Python Execution Function, and Custom Python Tool, and support R&D work that routes specialized tasks to lightweight ML and computer vision models to reduce token usage and operational cost.\nAt MicroMind MicroApps, build SaaS products on the YourApps framework, including a full-stack multi-tenant application template using React, Node.js, PostgreSQL, and Prisma, with the Executive Gold Design System, V4 UI SDK, MicroMind Core-powered AI copilots, and multi-language support across five locales.",
                'order' => 1
            ],
            [
                'section' => 'internship',
                'title' => 'Agentic AI Developer Intern',
                'subtitle' => 'Aug 2025 - Oct 2025',
                'institution' => 'AI MicroMind · Banha, Al Qalyubiyah, Egypt · On-site',
                'description' => "Working on designing, developing, and testing AI agents, including integrating APIs, implementing decision making logic, and optimizing performance for real world tasks.",
                'order' => 1
            ],
            [
                'section' => 'internship',
                'title' => 'Generative AI Training',
                'subtitle' => 'Sep 2025 - Feb 2026',
                'institution' => 'Information Technology Institute (ITI)',
                'description' => "• *Building LLM Applications with Prompt Engineering* (Sep 2025 - Oct 2025): Training focused on prompt engineering and practical LLM application development.\n• *Building RAG Agents with LLMs* (Jan 2026 - Feb 2026): Training focused on retrieval-augmented generation pipelines and agent-based LLM workflows.",
                'order' => 2
            ],
            [
                'section' => 'internship',
                'title' => 'Machine Learning Trainee',
                'subtitle' => 'Aug 2025 - Sep 2025',
                'institution' => 'Faculty of Computer & Information Sciences - Mansoura University',
                'description' => "Participating in a practical machine learning training program focused on real-world applications. Developing and implementing ML models using Python and Scikit-learn. Collaborating with peers to build and deploy AI projects that solve real-life problems.",
                'order' => 3
            ],
            [
                'section' => 'internship',
                'title' => 'Machine Learning Trainee',
                'subtitle' => 'Jul 2025 - Aug 2025',
                'institution' => 'National Telecommunication Institute (NTI)',
                'description' => "Working extensively with real-world datasets on tasks such as preprocessing, cleaning, and feature engineering. Building ML models like: Linear Regression, Logistic Regression, Decision Trees, KNN, SVM, and Neural Networks.",
                'order' => 4
            ],
            [
                'section' => 'education',
                'title' => 'Bachelor of Artificial Intelligence',
                'subtitle' => 'Sep 2023 – Present',
                'institution' => 'Mansoura University · Mansoura, Egypt',
                'description' => "Focused on machine learning, data structures, and AI systems engineering. Grade: Very Good",
                'order' => 1
            ],
            [
                'section' => 'volunteering',
                'title' => 'CIS Team MU',
                'subtitle' => 'Oct 2024 - Present',
                'institution' => 'Volunteer Roles',
                'description' => "• *AI Mentor* (Sep 2025 - Present): Mentoring students in AI and machine learning concepts, guiding them through projects, and helping them strengthen their technical skills.\n• *AI & Data Science Member* (Oct 2024 - Present): Participating in workshops, projects, and community activities as part of the AI and Data Science team.\n• *Public Relations & Fundraising* (Jan 2025 - Present): Contacting speakers, organizing events, and supporting fundraising efforts to help grow team impact and revenue.",
                'order' => 1
            ],
        ];

        foreach ($resumeItems as $item) {
            ResumeItem::updateOrCreate(
                ['section' => $item['section'], 'title' => $item['title']],
                $item
            );
        }

        // 6. Seed Achievements
        $achievements = [
            [
                'title' => 'Qualified for Nile University Competitive Programming Arena (NUCPA)',
                'year' => '2025',
                'description' => "Team '3okha we rabak yfokaha' secured 19th rank out of 500+ teams and qualified for the next stage in Cairo.",
                'is_highlighted' => false
            ],
            [
                'title' => 'Top 50 in Huawei Developer Competition 2025',
                'year' => '2025',
                'description' => "Team Notq – AI Therapy qualified among the Top 50 teams in the Huawei Developer Competition 2025 – HCDG Northern Africa.",
                'is_highlighted' => true
            ],
            [
                'title' => 'HCIA-AI V4.0 Certification',
                'year' => '2025',
                'description' => "Successfully completed the HCIA-AI V4.0 Course from Huawei ICT Academy-Egypt, achieving a score of 855/1000 in the final exam.",
                'is_highlighted' => false
            ],
            [
                'title' => 'Codeforces Specialist - Rating 1425',
                'year' => '2025',
                'description' => "Reached Specialist rank on Codeforces with a rating of 1425, ranked #430 in Egypt and #19 in Mansoura. Competitive programming is a favorite side hobby that sharpens problem-solving skills.",
                'is_highlighted' => true
            ]
        ];

        foreach ($achievements as $ach) {
            Achievement::updateOrCreate(
                ['title' => $ach['title']],
                $ach
            );
        }
    }
}
