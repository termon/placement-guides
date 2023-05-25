<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s1 = User::where('email', 'staff@mail.com')->get()->first();

        $b = Book::create([
            'title' => 'SCEIS Placement Handbook',
            'slug' => 'sceis-handbook',
            'description' => 'Placement Handbook for School of Computing Engineering & Intelligent Systems',
            'user_id' => $s1->id
        ]);
        $r = Book::create([
            'title' => 'Recruit Handbook',
            'slug' => 'recruit-handbook',
            'description' => 'Handbook Covering Use of Recruit for Students in School of Computing Engineering & Intelligent Systems',
            'user_id' => $s1->id
        ]);

        // add pages to Placement Handbook
        Page::create([
            'book_id' => $b->id,
            'title' => 'Background',
            'markdown' => $this->background,
            'slug' => 'background',
            'sequence' => 1
        ]);
        Page::create([
            'book_id' => $b->id,
            'title' => 'Introduction',
            'markdown' => $this->introduction,
            'slug' => 'introduction',
            'sequence' => 2
        ]);
        Page::create([
            'book_id' => $b->id,
            'title' => 'Preparation',
            'markdown' => $this->preparation,
            'slug' => 'preparation',
            'sequence' => 3
        ]);
        Page::create([
            'book_id' => $b->id,
            'title' => 'On Placement',
            'markdown' => $this->onplacement,
            'slug' => 'on-placement',
            'sequence' => 4
        ]);

        // add pages to Recruit Handbook
        Page::create([
            'book_id' => $r->id,
            'title' => 'Recruit - Student',
            'markdown' => $this->recruit_student,
            'slug' => 'recruit-student',
            'sequence' => 1
        ]);
        Page::create([
            'book_id' => $r->id,
            'title' => 'Recruit - Academic',
            'markdown' => $this->recruit_academic,
            'slug' => 'recruit-academic',
            'sequence' => 2
        ]);

    }


    private $background = <<<EOD
    ![img](/images/logo-placement.png)

    ## Scope

    The aim of this document is to offer a framework for quality assurance and control in relation to placement-learning. It also aims to enable the [School of Computing, Engineering and Intelligent Systems](https://www.ulster.ac.uk/departments/dvc/cebe/school-of-computing-engineering-and-intelligent-systems) to support the management and operation of placement within the Faculty.

    ## Handbook Audience

    The handbook is for students undertaking placement modules:

    > - COM367 Professional Practice - Computing
    > - MEC361 Placement – Magee Engineering.

    and provides information and guidance on all aspects of placement preparation in Year 2 and information about what happens whilst on placement in Year 3.

    ## Glossary

    The vocabulary of placement learning includes many terms, which are used in different ways by different Schools. The following glossary provides the definitive usage of the terms as they apply within this document.

    **Placement Tutor (Co-ordinator)** is a member of academic staff designated by each School to arrange and/or approve placements and to support students through the placement process. They are also responsible for coordinating the placement process for the courses they are responsible for in collaboration with the Placement Administrator and/or Courses Coordinator.

    **Placement Administrator** is a member of clerical staff within the School, providing a support role in engaging with Employers and Students. This person also acts as an information point of contact if an Academic Supervisor or Placement Tutor is unavailable.

    **Courses’ Coordinator (Course Director)** is a member of academic staff who is responsible for the day to day management of one or more courses within the school and would typically be the point of contact for general course related queries/issues.

    **Academic Supervisor** is a member of academic staff who conducts the specified number of placement visits.

    **Industrial Supervisor** is a member of the industrial organisation providing opportunities for placement learning. This person will normally act as the student’s mentor and be responsible for assessing progress and completing relevant documentation during the placement.

    **Placement (Work Based Learning)** is a planned period of learning, normally outside the University at which the student is enrolled, where the learning outcomes are an intended part of a programme of study. It includes those circumstances where students have arranged their own placement, with the approval of the Placement Tutor.

    **Learning Outcomes** are the outcome from a learning process. The intended learning outcomes of placement are specified in the individual course programme specification and the corresponding student handbook. They are statements that predict what learners should have gained as a result of learning activities during the placement.

    **[Handshake](https://ulster.joinhandshake.co.uk/login)**  [^1] is a tool used by the University to advertise placement and graduate posts to students. You will use this system as your primary tool to search for and apply for placement opportunities.

    **[Recruit](https://recruit.ulster.ac.uk)** [^2] is a separate University system used to manage placement, and is typically used to formally record placement offers, exemption requests, and all on-placement assessment.

    **Employability & Careers** [^3] is a department witin the University that provides students with support in developing their employability skills during their time at University. Staff from employability and careers are involved in placement preparation activities during year 2.

    ## Staff

    A range of staff within are involved in the delivery and management of placement. The key staff you will be engaging with include:

    - **Placement Coordinator** - Aiden McCaughey: a.mccaughey@ulster.ac.uk
    - **Placement Administrator** - Cheryl Mullan: c.mullan@ulster.ac.uk
    - **Computing Course Coordinator** - Mairin Nicell: ma.nicell@ulster.ac.uk
    - **Engineering Course Coordinator** - Dr Shaun McFadden: mcfadden2@ulster.ac.uk
    - **Employability & Careers Manager** - Moira McCarthy: m.mccarthy2@ulster.ac.uk

    [^1]: https://ulster.joinhandshake.co.uk/login
    [^2]: https://recruit.ulster.ac.uk
    [^3]: https://www.ulster.ac.uk/employability

    EOD;

    private $introduction = <<<EOD
    ## Placement Summary

    Placement (also known as *Work-based learning*) forms an integral part of all the undergraduate degree programmes of study within the School of Computing, Engineering and Intelligent Systems, within the Faculty of Computing, Engineering and the Built Environment at Ulster University.

    In relation to honours degree programmes, work-based learning is a continuous period of work, normally 48 weeks in length (excluding holidays). It occurs in the penultimate year of the course and must be completed before commencement of the final year of study. Students must achieve the learning outcomes associated with the placement period before commencement of the final year of study.

    Placement may be undertaken locally or abroad, depending upon the intended learning outcomes of the course and exchange arrangement in the receiving country. The placement year is formally assessed, and minimum of a Pass grade must be obtained to qualify for the award of Diploma in Professional Practice (DPP) or (DPPI) in the case of an international placement.

    Some students may choose to undertake a Study Abroad programme such as [Study USA](https://www.ulster.ac.uk/goglobal/study/study-usa) or [Erasmus+](https://www.ulster.ac.uk/goglobal/study/erasmus/studies) in lieu of their placement year. In this case these students will be awarded a Diploma In Area Studies (DAS/I) instead of the normal Diploma in Professional Practice (DPP/I).

    Where appropriate, students may apply for [exemption](/preparation/#placement-exemption) from placement based upon verifiable evidence of relevant prior experience or qualification. Exemptions will be granted by Course Committees in accordance with the regulations outlined in the relevant course documentation. The intended learning outcomes for work-based learning are clearly articulated within the module specifications, which link to the intended learning outcomes for the programmes and are consistent with available subject benchmarks. Additionally, the assessment strategy is outlined within module specifications and is contained within this handbook.

    Full-time undergraduate courses within the School of Computing, Engineering and Intelligent Systems contain a placement element.

    | Course Name | Course Code |
    | ----------- | ----------- |
    | BSc Hons Computer Sc. FT | 2134 |
    | BEng Hons Comp Games Dev FT | 4239 |
    | BSc Hons Computing with Education FT | 4248 |
    | BSc Hons Comp ScSwareSyDv FT | 6245 |
    | BEng Hons Computer Engin FT | 7096 |
    | BSc Hons Inform TechnologiesFT | 7098 |
    | BEng HonsRenew EnergyEngDPP FT |7072 |
    | BEng Hons Mech & Manuf Eng FT | 7090 |
    | MEng HonsRenew EnergyEngDPP FT | 7092 |
    | MEng Mech & Manuf Eng FT | 7091 |
    | BEng Hons Elect & Electr EngFT | 7447 |
    | BEng Hons Artificial Intell FT | 7832 |
    | BEng Hons MechEng w EntDev | 8146 |
    | BEng Hons ElectEng w EntDev | 8147 |

    ## Placement Benefits

    Placement is an integral part of our degrees and has clearly defined benefits for the student, the employer and the university.

    ### Student Benefits

    Placements are aimed at providing students with the experience and discipline of working in a computing / engineering environment and the opportunity to develop skills in particular areas. They will also gain insight into the wider commercial aspects of business life including the management of the organisation and the client-company relationship. In particular students will gain

    - The experience and discipline of working in a relevant computing/engineering environment.
    - Personal development: self-confidence, self-discipline, responsibility etc.
    - An insight into the wider commercial aspects of business life including exposure to company management and the client-company relationship
    - Intellectual challenge and possible ideas for final year project
    - Clarifying final year studies and future career opportunities
    - Improved employability including possibility of a graduate job offer on completion of their degree.
    - Salary and financial implications. Some students receive sponsorship from their employer to complete the final year of their course.

    Students who undertake placements recognise the vital role that work experience plays in enhancing their career progression and employability prospects following graduation. Students returning to University from their placement year overwhelmingly agreed that time on placement had been a positive experience, claiming the main positive aspects as an increased confidence and maturity, both in interpersonal skills and aptitude for learning.

    ### Employer Benefits

    At a reasonable cost, employers can benefit from an enthusiastic staff member, fresh from two years undergraduate study, who can often be targeted at specific short to medium term projects. The student comes equipped with specific subject related skills, as well as an up-to-date overview of the relevant computing and engineering disciplines, and should become fully productive at an early stage.
    Many employers are also keen to make (and to be seen to make) a positive contribution towards the provision of a high-quality work force for the future. As a placement organisation, it is also easy to make known to the academic community views and requirements regarding higher education.

    Whilst there is not normally a long-term commitment to future recruitment, there is obvious potential, particularly where placements are linked to sponsorship. Sponsorship arrangements vary greatly but can include financial support whilst studying, vacation employment and, possibly, an eventual employment arrangement. Potential employers should note that placement students must return for final year. It is not unusual for companies to gain favourable publicity because of sponsorship arrangements.

    In particular, the employer will gain

    - Cost effective source of labour
    - Motivated, committed, and loyal employee
    - Opportunity to assess student’s potential for future employment
    - Flexibility in staff deployment and increased productivity
    - Increased awareness of current academic developments in computing / engineering
    - Breakthrough thinking (not blinkered or stereotyped)
    - Generating goodwill within the academic community
    - Payback (Putting something back into the system)

    ### University Benefits

    Primarily, placements help us to provide graduates with the qualities that employers have told us they require. The links with industry, which placements promote, also help us to keep abreast of changing requirements and can lead to other joint ventures such as custom-built training courses and collaborative research.

    ## Placement People

     1. **Placement Tutor / Coordinator**

        The Placement Tutor is responsible for overall coordination of placement activity and is your first point of contact during the placement preparation phase.

     2. **Academic/Industrial Supervisors**

        During your placement you will be visited twice by an academic member of staff allocated as your “Academic Supervisor”. The academic supervisor is your primary (academic) point of contact during your placement, with the placement tutor being the secondary point of contact. Your placement company will also allocate a member of staff as your “Industrial Supervisor”, who will be responsible for your supervision within the company.

     3. **Placement Administrator**

        The Placement Administrator is a member of the school office staff who carries out various administrative tasks during the placement process. You may receive communications from the administrator regarding placement opportunities, events or other important activities.

     4. **Courses Coordinator (Course Director)**

        The Courses’ Coordinator is a member of the school academic staff who manages one or more courses within the school and is someone you may receive communications from time to time regarding placement activity.

     5. **Employability & Careers**

        The Employability & Careers department within the University provide students with support in developing their employability skills during their time at University. Employability staff are involved in various placement preparation activities in year 2.

    EOD;

    private $preparation = <<<EOD
    ## Introduction

    Placement preparation starts during semester one of year two with EEE407 Professional Development module. This module is used to deliver specific placement preparation classes and also introduce students to professional issues that are relevant in the workplace (Professional Bodies (BCS, IEEE), Ethics, Intellectual Property Rights, Computer Misuse, Entrepreneurship, Health and Safety, Regulation and Control of Personal Information etc).

    During placement preparation classes you will

    - develop a CV to be used in placement applications
    - learn about how to prepare for interviews
    - be offered an opportunity to take part in mock interviews
    - learn how to prepare for psychometric testing used by some employers
    - have an option to attend employer talks on placement opportunities
    - have an option to attend specialist talks e.g. enhancing employability skills, dealing with stress before interviews etc.
    - learn and use the University systems - ‘Handshake’, used by employers to advertise posts and ‘Recruit’ – used for the management of placement.

    ## Placement Opportunities

    Note that whilst assistance in finding placements is provided, the ultimate responsibility for finding a suitable placement lies with the student. Students are required to be fully committed to obtaining a placement as an essential element of the course. A student who fails to demonstrate commitment (e.g. by non-cooperation in the placement process) will not be permitted to proceed to final year of the course.

    ### Approved Posts

    The primary resource for finding placement opportunities is via [Handshake](https://ulster.joinhandshake.co.uk)  These posts have been pre-vetted and approved by university staff as being suitable placement opportunities.

    ### Unapproved Posts

    A secondary but just as important resource involves individual searches by students to locate relevant posts via for example, third-party recruitment or individual employer websites, newspaper advertisements, word of mouth, direct contact with employers etc. Students should ensure that any post applied for is relevant for their degree and when in doubt the student should contact the Placement Tutor for advice/guidance. As these posts have not been vetted and approved by university staff you will have to have the post approved before you can accept an offer from a company. See section 3.6 on how to have a placement offer approved.

    ## Placement Applications

    ### Making Applications

    CV preparation is an element of the Professional Development module to help students produce high quality CVs that give them the best opportunity to obtain a placement interview. You should only start applying for placements once you have an approved CV.

    - Approved Placements: You should review posts being offered via Handshake and select those that are a good fit for your skillset and area of interest (computing/engineering). You should also consider other factors such as the location of the post, whether travel or accommodation are required, and additionally salary which is especially important if you will require accommodation. Only when you are satisfied that the post is relevant and one that would you be happy to accept if offered should you apply.

    - Unapproved Placements: You may (and indeed should) also use other external resources such as employment websites, direct company applications etc, to widen your application reach. Note that these applications are not formally recorded, and you should keep a record of your efforts in these areas. This is especially relevant in case where you are offered on of these posts as you will have to make an external application via the ‘Recruit system’ and have the post formally approved before being able to accept the offer (see section 3.6).

    ### Best Approach

    Engage with the placement process and avail of all assistance provided during placement preparation classes. Get your CV ready as early as possible and start the placement search at the earliest opportunity.

    You should review opportunities advertised on ‘Handshake’ on a weekly basis and apply for all posts that are suitable in terms of your skillset and any other criteria that are important (location, the job description, salary etc). Review your progress regularly.

    ### Poor Approach

    Decide to leave applications to a certain time of year or simply never get around to making that first application. This may be due to fear of the placement process, and if you have never been involved in an interview before, is entirely understandable. You should however address this issue by engaging fully in the placement preparation process and avail of support available to prepare you for the application and interview process.

    You should avoid the “scatter gun” approach to placement applications where you apply for anything advertised, without considering factors such as relevance of post to your skillset, location, salary, and any factors that would mean you would not accept the post if offered.

    You should also avoid the “cluster approach” to placement applications where every few months you decide to login to Handshake as you need to give the appearance of placement activity and thus apply for any placement posts currently active, irrespective of their suitability.

    Typically, those students who engage in any of the above approaches struggle to obtain a placement.

    ### Unpaid Posts

    The University does not advertise or promote unpaid placements. However, if a student obtains an unpaid placement, then they must firstly have it approved but more importantly need to confirm with the Placement Tutor that they have fully considered the financial implications of an unpaid post and are still willing to accept.  In some circumstances this is possible, where the post is close to home and the student can live at home with minimal commute.  The most typical examples of an unpaid posts are with schools, and these can be successful and very relevant when the student is considering the possibility of a PGCE on graduation.

    ### Posts Outside UK/Ireland

    For placements outside the UK/Ireland there will be country specific visa requirements. If the job was advertised via Handshake, then the company should have support in place for helping the student obtain a visa. If the job was not advertised via Handshake, then the best advice is

    1. At interview bring up subject of visa and determine if the company will support a visa application.
    2. If job is offered (need support in 1), then research the specific visa requirements for that country via relevant embassy website etc.
    3. Discuss with Placement Tutor.

    ## Placement Interviews

    ### Interview Offer

    Employers will typically send interview details to each student shortlisted via email (you should only provide your official University email address in your CV). It is thus important that you check your university email account daily during this period.

    Students must confirm by reply email their attendance at the interview. Only in exceptional circumstances should a student request a different day/time for an interview. If an interview clashes with a timetabled class on your course, then you should email the relevant academic member of staff and inform them of your absence due to a placement interview. Academic staff are aware of the importance of interviews and will facilitate your attendance.

    If for any reason you cannot attend an interview (e.g., you have since been offered and accepted another post), then you MUST notify the employer via email that you cannot attend and provide a reason.

    Students who simply decide not to attend an interview or worse don’t even notify the employer of their non-attendance, create an extremely bad impression of the School/University. It is extremely unprofessional and will not be tolerated. In these circumstances a student can be removed from the ‘Handshake’ system and will have to find an external post via their own efforts.

    ### Interview Preparation

    You should firstly avail of all interview preparation classes offered as part of placement preparation. To prepare for a specific interview you should do the following:

    1. Research the Company offering the post – e.g. review information on their website, and ensure you are familiar with their main business, their structure, any specific info on the activities carried out at the location where the post is being offered (particularly relevant for larger multinational organisations). Interviewers will want to know that you have a good grasp of who the placement provider is and what they do.

    2. Review the Job Specification – the job specification advertised typically will provide some details on the job role and thus the type of work, tools, processes etc that are part of the role. You should therefore ensure that you are as familiar as possible with any specific technologies or skills mentioned. For example, if the role requires someone with good teamworking skills then you should prepare an answer for a question that asks you to provide evidence of your teamworking skills. This might be an example of a group project in university or via some other part-time employment. Where the job specification mentions technical skills e.g., knowledge of Software Testing or experience of Solid Works Design, then you should prepare for questions around these areas.

    3. Prepare answers to obvious soft skills questions such as those around communication, problem solving, work ethic, flexibility/adaptability, interpersonal skills and teamworking.
    Overall employers are looking for students with an obvious interest in their chosen field (look for ways to demonstrate your inquisitiveness in the subject area) and an interest in working for the placement provider.

    ## Placement Offers

    Typically, an employer will contact students directly with offers, via a telephone call or an email (thus the importance of checking your university email daily). Before accepting an offer, you should inform the Placement Tutor that you have received an offer and that you wish to accept. To do this, all placement offers must be recorded and approved via Recruit.

    ### Approved Post

    If a placement post you are offered was advertised on Handshake and you applied for the post via Handshake then the post will be listed in your applications on Recruit. To record the offer:

    - Login to [Recruit](https://recruit.ulster.ac.uk), navigate to your list of Applications via ```Year Long Placements / Applications``` and click the ```Confirm Offer``` link against the relevant application.

    - Complete the placement offer form and attach a document containing suitable evidence of the placement offer (screenshot of letter of offer or email etc).

    - Submit the offer for review by the placement tutor.

    > **NOTE:** [click here to view recruit student guidance for confirming an approved post](/recruit/student/#approved-post)

    ### Unapproved Post

    If a placement post you are offered was not advertised on Handshake and you applied directly to the company, then you need to log an external application on Recruit. To log this application you will need a job description from the company to help the Placement Tutor make a decision on the validity/suitability of the post. You should therefore request a job specification from employer that contains the following information:

        1. Employer name
        2. Address (including telephone number, website)
        3. Title of Post
        4. Start/end dates of post [1]
        5. Hours of work
        6. Salary
        7. HR contact (name, position, email, tel/mobile)
        8. Brief job description (job summary)
        9. List of duties of post [2]
        10. Essential / Desirable Skills

    [1] Most placements typically last 12 months with most starting during the summer period at end of year 2. For those students who do not get placed until semester 1 of year 3, then the post may be shorter.  However, posts CANNOT end before May of the placement year to allow the necessary assessments to take place.

    [2] Provide as much detail as possible and ensure duties are computing or engineering related and relevant for a student studying at undergraduate degree level.

    To record the offer:

    - Login to [Recruit](https://recruit.ulster.ac.uk) and log an EXTERNAL APPLICATION under ```Year Long Placements / Applications / External Applications / Log External Application```

    - Complete the application form using a suitable job description provided by the company (see above for details required). You may already have this information if you followed the guidance regarding keeping records of external placement applications. Attach a document to the application containing suitable evidence of the placement offer (screenshot of letter of offer or email etc).

    - Submit the application for Review.

    - **Send an EMAIL to the Placement Tutor**, asking them to review and approve the post as they are not informed automatically when you log an external application.

    > **NOTE:** [click here to view recruit student guidance for confirming an unapproved post](/recruit/student/#unapproved-post)

    ### Multiple Offers

    The University invests time in creating good relationships with placement providers. To ensure these relationships are maintained and employers continue to offer posts into the future, we expect students to accept the first placement offer received. It is important therefore that students only apply for posts where they will be willing to accept an offer of employment.

    Only in the situation where multiple offers are received around the same time and a student has not yet accepted an offer, then a student may choose a preferred post and reject the others.

    A student should ensure that they respond to an offer within the time period stipulated in the offer. This can vary from employer to employer but is typically around 5-7 days.

    ### Switching Offers

    Ideally as outlined above, we want students to only apply for posts they are willing to undertake and to accept the first post offered.

    Only in exceptional circumstances can a student change a placement after having already accepted another.

    The student should firstly communicate with the placement tutor and explain their situation.

    - If the tutor is supportive of their case then the student will be asked to communicate with the employer and explain their reasons for wishing to reject the offer. If the employer supports their termination of the offer then the student should forward confirmation of this to the placement tutor who will then cancel their original placement. The student will then log the new placement offer as normal.

    - If the placement tutor or the employer do not support termination of the existing offer then the student should honour their original acceptance of the post and continue with the placement.

    >⚠️ **NOTE**: Non-abidance of the guidance above can mean your placement will not be recogisned by the university and thus you will not be awarded your Diploma in Professional Practice

    ## No Placement Offers

    Students often wonder `Why am I not securing interviews and ultimately job offers?` The main reasons include:

        - lack of engagement in the placement prepararation process
        - failure to make sufficient/regular placement applications
        - poor quality CV
        - poor interview preparation
        - insufficient evidence of technical skillset at interview

    It is therefore important that you constantly review your efforts and ensure you are making best use of the resources available to secure a placement.

    Look at the skills employers are consistently asking for in adverts and consider if your CV includes these in your skillset. Employers want evidence that students are interested in their subject and can demonstrate a willingness to learn outside of modules studied.
    If you are not securing interviews, then you should review the quality of your CV and ensure you meet at a minimum the essential criteria outlined in the advert.

    If you are securing interviews but are unsuccessful, then do not despair as you may have to go through several interviews before securing a post. Often you may have interviewed well but another candidate was just that bit better in some element of the interview. You should ask for feedback to determine where you need to review your interview skills. Additionally, the employability department provide interview skills training as part of the placement preparation process.

    One major factor in many interviews is the inability of interviewees to demonstrate knowledge of basic technical elements required in the role. These are often (but not always) listed in the job description and should be a starting point for preparing for the interview. Employers also want applicants that can demonstrate a real passion for their subject and a yearning to learn as much as possible during their degree and their placement year.

    ### Placement Exemption

    Students may only apply for exemption from placement on the following specific grounds:

    - **Prior Work Experience (PG):** students can apply for exemption on grounds of prior relevant work experience.

    - **Foundation Degree (PH):** students can apply for exemption having already completed a placement element in a foundation degree linked to the program of study.

    - **Extenuating Circumstances (PF):** students who have extenuating circumstances that precludes them from taking part in placement. Student must provide evidence to support their application e.g. in case of a medical condition a doctor’s letter.

    - **Sufficient Effort (PE):** students can apply for exemption on the grounds that they have made sufficient and consistent efforts throughout the year to obtain a placement, but due to circumstances outside their control they were unable to secure a post.

    **NOTE:** Applications of type **PE** can only be made if/when you are informed that this exemption category is being opened by the faculty (this is normally mid/late summer). In all other cases, students can make an exemption application at any point during Year 2.

    Any student wishing to apply for exemption should do so using the exemption application feature on [Recruit](https://recruit.ulster.ac.uk), selecting the above exemption category ```(PG, PH or PF, PE)``` that best describes their application.

    ### Remaining Unplaced

    Any student not placed or exempted by start of Year 3 will automatically be placed on a Leave of Absence (LOA) from their course. This is an administrative procedure to prevent students having to pay fees whilst unplaced.

    Unplaced students should continue looking for a placement up until December of Year 3 (latest start for a placement).  If they obtain a post before that date, they will be taken off LOA and will be able to register for the placement year. Whilst some placements will still be available on Handshake at this time of the year, students should ideally work on applying for placements via direct contact with companies, employment websites etc.

    If a student is unable to secure a placement by December, they will remain on LOA during year 3, and will be asked to apply for exemption as some point during semester 2/3. If an exemption is approved the student would progress to final year with their normal year cohort. In the case where the exemption request is not approved the student will have to retake their placement year.

    Students who do not complete a placement and progress to final year, will not be awarded their diploma in professional practice (DPP) but in all other regards will complete their degree as normal.

    EOD;

    private $onplacement = <<<EOD
    ## Responsibilities

    On commencement of a placement there are certain repsonsibilites placed on the student, the employer and the overall supervision of the student during the placement.

    ### The Student

    - Complete the Health and Safety Induction check and upload to the Recruit system
    - Complete the Placement Learning Agreement document and upload to the Recruit system.
    - Have your employer complete the Placement Indemnity form and upload to the Recruit system. Where the company has any queries or expresses any concern in signing the form, then they should be referred to Employability and Careers who will deal with these issues.
    - Update the placement details and industrial supervisor details on the Recruit system.
    - The student will comply with all company regulations and conditions of employment.
    - The student will work diligently and always behave in a manner appropriate to the work. environment – considering the professional issues elements of placement preparation.
    - The student will complete the required assessment tasks and engagement in organisation of placement visits.
    - The student will keep in contact with their allocated placement academic supervisor and where necessary placement tutor throughout the placement year and keep him/her fully informed of any difficulties or problems that may arise from time to time.
    - Maintain a journal (logbook) and produce a report at the end of placement.

    ### The Company

    - An industrial supervisor will normally be appointed by the company to manage and monitor the student’s work and assess the student at the end of the placement.
    - A suitable programme of work providing the student with the opportunity to complete ‘real’ tasks that will eventually benefit the company. This should be documented in the placement learning agreement.
    - A suitable working environment will be provided, including adequate access to computers etc.
    - The company may identify a peer (mentor) who will help the student settle in and ‘show them the ropes’ during the first few weeks (this may be the outgoing placement student).
    - At the start of the placement, the student will be provided with suitable introductory material, background reading, training etc. as required.
    - The student will be paid an appropriate salary. (There are wide variations!)

    ### Supervison

    - The University will appoint an academic member of staff as the “Academic Supervisor” (Placement Visitor) for each student at the beginning of the academic year.
    - The Academic Supervisor will visit the student at work twice during the placement year. The first visit will typically take place in Nov/Dec and the second visit in (March/April). These can be adjusted as agreed with the Placement Tutor depending on circumstances of the placement (e.g. the placement start date). Placement visits may be in person or virtual (e.g. MS Teams).
    - The day-to-day work of the student is monitored by the company Industrial Supervisor who is also required to make themselves available to attend the placement visits and provide the visitor with feedback on the students’ progress.
    - If any problems arise which threaten the successful progress of the placement these should be taken up immediately between the student and the Company Supervisor. If a satisfactory solution cannot be found, the aggrieved party (student or Supervisor) should contact the relevant Academic supervisor as soon as possible. In cases where the issue cannot be resolved then the Academic supervisor can escalate the issue to the Placement Tutor.

    ## Placement Visits

    ### Purpose of a Visit

    During the placement year the student will be visited twice by the academic supervisor. During these visits, the academic will speak to both the student and the supervisor to assess progress and formally assess the practical element of the placement.

    ### Visit Preparation

    The academic supervisor will email you via your university account asking for suitable dates to carry out a visit. You should liaise with your industrial supervisor and ensure that they are also available at any agreed date/time.

    The academic supervisor will then schedule the visit via [Recruit](https://recruit.ulster.ac.uk), and you will receive an automated confirmation email with an attached calendar event. The student should then complete a placement visit summary form (found in the document section on Recruit) and upload this to the visit area on Recruit.

    ### What Happens at a Visit?

    A Placement Visit will typically take up to one hour.  In the visit, the academic supervisor or will typically speak to the student and industrial supervisor separately to provide an opportunity to speak freely about the progress of the placement.

    When meeting with the student, the academic supervisor will want to:

    Verify at the first visit that:

    1. The Health and Safety Check List has been completed and deal with any issues noted.
    2. That the student has submitted a signed learning agreement.
    3. That the student has submitted a signed company indemnity form.
    4. That the student is aware of the company policy on bullying and harassment (i.e. does the student know what to do if they think they are being bullied or harassed?).
    5. If the student has flagged any disability with the company, that the company has dealt with it in an appropriate manner. Under SENDO legislation employers must make reasonable adjustments to facilitate students with a range of disabilities including physical, visual, hearing, learning, medical and mental. Note that students are not obliged to disclose any disability.

    Verify at both visits:

    1. Discuss the type of work undertaken to date, training received, systems/tools used.
    2. Look for evidence of soft skill enhancement.
    3. Verify that the student has been maintaining their placment journal and where relevant provide some constructive comments.
    4. Look for evidence of achievement of the placement competencies which contribute to the overall placement assessment.

    When meeting with the industrial supervisor, the academic supervisor will want to:

    - Gain an appreciation of the industrial supervisor view on the students’ strengths and weaknesses and their performance to date.
    - Determine if there is any potential for more demanding or varied work. This can be of particular significance where the student feels the work currently being offered varies widely from that advertised via the original job description.
    - Gain an appreciation of the work programme for the rest of the year.
    - At the second visit determine if there will be a requirement for placement students the following year.
    - Develop other Company – University Links.

    The academic supervisor, in collaboration with the industrial Supervisor will then formally assess the students’ progress.

    ### What is a Journal?

    Students are required to maintain a journal during their placement using the Recruit Journal feature. This presents a factual record of work experience that you have gained and the learning that you have achieved.  It will be a valuable resource for you in the preparation of your Placement Report. It will be inspected by your Academic Visitor at each visit, and by the assessor of your Placement Report.  Your journal will be used as an evidence source to corroborate your achievement of the Placement Competencies and claims that you make in your Placement Report.

    Failure to maintain a satisfactory journal may therefore impair your performance in these components of your assessment. As this is a record of your work and learning experience, it should include

    - Notes and observations on the work you have done. This might include (but is not limited to) any of the following (technical issues, business issues, social, legal & ethical issues, industrial relations, management practices).
    - Reflections on the skills, knowledge, understanding and experience you have acquired.

    You are advised to ensure that details of a technical nature comply with the organisation's policy and practice on confidentiality; company material may only be included if explicit permission has been given.

    In general, you should begin making entries in your journal at the beginning of your placement and make approximately one entry each week until your placement is over. Journal entries will vary in length depending on many factors.  For example: descriptions of new experiences should be fully detailed, whilst descriptions of routine tasks might be briefly noted. Reflections on your learning might not occur in every entry but when they do, they might require a more detailed note. You may write in an informal style, but it should be understandable by a broad audience, including your assessors. As a rough guide, you should expect to write 100-200 words each week - with shorter entries being balanced by longer ones.

    ### What are Competencies?

    Over the course of the placement year the student must demonstrate achievement of ten work-based competencies to pass the practical element of the placement year.

     1. Independence: It is expected that as your placement progresses, you can demonstrate that you have gained enough knowledge of your role, to be able to work in an independent manner and not require constant supervision.
     2. Flexibility: Can you demonstrate to your employer that you are flexible regarding the duties you may be allocated. Remember you are working in a commercial setting and the needs of the company come first – so it’s quite normal that your work/role may change over the year.
     3. Timekeeping: You must attend for work at the specified time – bad time keeping is one area that reflects badly on your reliability. You must ensure you follow work protocols regarding asking for time off, holidays etc.
     4. Teamwork: Companies want employees who are team players. Can you demonstrate that you are there to work in a team environment and will do whatever is necessary (when asked) to ensure the team meets its targets/goals.
     5. Interpersonal Skills: Can you demonstrate that you have good interpersonal skills when dealing with co-workers or customers. Have you good verbal and written communication skills?
     6. Self-awareness: Are you aware of your own skill set and areas that require attention? Do you listen to your industrial and academic supervisors and take any feedback provided in a constructive manner – with an aim to improve any areas that may require attention.
     7. Organisation and planning: Do you keep good records of duties assigned and do you ensure you plan your day to ensure you carry out your duties in a timely manner. Do you follow up with tasks that may require communication back to your supervisor, co-workers and customers?
     8. Health and Safety Awareness: Have you completed workplace Health and Safety induction and completed the Health and Safety checklist on Recruit. Do you follow all Health and Safety protocols (especially when working in an industrial/factory environment)?
     9. Social and Professional Awareness: Are you aware of your responsibility to present a professional image internally within an organisation and externally with customers. Are you aware of the need to treat any access you may have to sensitive information with the utmost respect, following ethical guidelines discussed during placement preparation (Professional Development)
     10. Technical Expertise: Finally, are you able to demonstrate good technical ability in your role – and most importantly can you demonstrate a progression in performance during the placement year.

    ## Placement Assessment

    Over the placement year the student is working towards achievement of a Diploma in Professional Practice DPP (or DPP(I) in the case of a placement outside the UK/Ireland), and this is assessed in two parts.

    ### Visit Assessments

    The overall practical element of placement is simply marked as ```Pass/Fail``` and you must pass to be eligible for the placement Diploma in Professional Practice award. For a pass to be achieved the student must demonstrate achievment of all placement competencies.

    Assessment of these competencies is made at the placement visits. Students should review the feedback following the first visit regarding outstanding competences and what they need to work on for the second visit. Students should ensure they use the journal to record any evidence of meeting those competencies, so that they can talk about what they have achieved at the second visit and in the final report.

    The placement visits are managed via the [Recruit system](/recruit/student#placement-visits).

    ### Final Report Assessment

    As the student approaches the end of the placement, they will be required to submit a Final Placement Report (typically late May/early June), that documents their placement year. This report provides the student with an opportunity to highlight their knowledge of the organisation and team in which they work, training undertaken and duties of the post, and most importantly to reflect on the year and what they have achieved. The placement journal is a crucial tool in completion of the report as it will allow the student to record important information and reflection over the year that will be useful in constructing the report. This report is formally assessed and is used to determine the overall placement grade of ```Fail, Pass, Commendation or Distinction```.

    The placement report is submitted via the [Recruit system](/recruit/student#final-report).

    ## Placement Issues

    Whilst on placement, student can encounter various issues that will require consultation in the first instance with the industrial supervisor, the academic supervisor and ultimately the placement tutor.

    ### Role Not as Advertised

    Sometimes the actual role given to the student may vary from that advertised in the original job specification. Students need to also realise that a company requires its employees to be flexible (one of the competencies) and carry out duties as required by the company at that time. However, if the change in duties is such that the student longer has an opportunity to carry out any of the work originally advertised, then the student should discuss this with the industrial supervisor in the first instance and then with the academic supervisor, to request work more aligned with what was originally advertised.

    ### Poor Performance

    Where a student does not perform as expected in a placement role, the company may decide to terminate the placement. This is an **exceptional** occurance and would normally only happen when all avenues to address the issues identified have been exhausted.

    Where issues do arise these would normally be discussed at the next available placement visit or where more urgent the industrial supervisor would contact the academic supervisor or placement tutor. Normally issues are related to the competencies outlined above with lack of technical ability being the most difficult to address. In most other cases the course of action required by the student is obvious and relies on the student taking responsibility for the issue(s) highlighed and being willing to take the necessary steps to address the issues.

    ### Redundancy

    In some rare cases an employer may make a placement student redundant or worse the company itself may cease trading. The placement student should contact their assigned academic supervisor and the placement tutor as soon as they receive notification that redundancy is a possibility or that a company may cease trading. In the case where you are being made redundant, your company/organisation may show some flexibility regarding your placement by means of 1) continuing your placement with reduced salary, or 2) continuing your placement on a part-time basis.

    Should either of these options be available; you should discuss your circumstances with your academic supervisor. Although this is not an ideal situation, you will need to balance the availability of alternative placement employment with the experience that you can gain with your current company/organisation.

    Depending on when the redundancy takes place the student may have completed enough time in the role to meet the minimum placement duration and it may be necessary to arrange a placement visit outside the usual visit dates with your academic supervisor.

    Where none of these options are available, the student will be provided with assistance in securing a replacement post.

    ### Bullying / Harassment

    The University requires each employer to have a Bullying/Harassment policy in place and the student should have been made aware of this policy during their induction with the employer. The student should follow the procedures in this policy in the first instance and additionally inform their academic supervisor of their circumstances. If required, the placement tutor can speak to the company supervisor to ensure that the situation is being addressed, and where it is not being addressed, the University reserves the right to remove the student from the placement if required.

    ### Terminate a Placement

    A student unilaterally terminating a placement before completion of the contract, is an exceptional situation and one that is normally extremely rare.

    When a student undertakes a placement they will have normally signed a contract stipulating amongst other things the period of employment. The contract may also have some conditions around termination of the placmement and these need to be honoured.

    Where a student is considering leaving a placement, they **must** in the first instance discuss the issues they are having with their industrial supervisor and/or the academic supervisor. Where required the academic supervisor will discuss the issues that may have led to the request to terminate the post with the industrial supervisor and placement tutor and aim to have them resolved.

    It is a requirement that a student does not withdraw from a placement, without the permission of the relevant Placement Tutor, who will have discussed the matter and had it approved by the student’s Course Director and where required, the Head of School within which their course resides.

    > NOTE: Terminating a placement means that a student will not have successfuly completed their placement year. In this case they will not be awarded the Diploma in Professional Practice DPP/DPP(I) and can at the discretion of the course committee, be required to repeat the year.

    EOD;

    private $recruit_student = <<<EOD
    Recruit is the University placement management system used to manage student placement activity including:

    - Logging placement applications made via Handshake or externally
    - Registering a placement offer and having it approved
    - Applying for exemption from placement
    - Managment of activities whilst on placement

    ## Login to Recruit

    You can login to Recruit via following url <https://recruit.ulster.ac.uk> using your normal university account credentials.

    ![img](/images/recruit/student/1-login.png)

    ## Confirm Placement Offer

    Once you have been offered a placement post you need to log the offer on the Recruit System to have it reviewed and approved.

    ### Approved Post

    If you applied for the post via Handshake, then it will be recorded in your list of applications on Recruit.

    To log an application, navigate to **Year Long Placements**, then under **Applications** select the application you have been offered and click the **Confirm Offer** link.

    ![img](/images/recruit/student/8-handshake-1.png)

    Now complete the form below and upload a document containing evidence that you have been offered the post.

    ![img](/images/recruit/student/8-handshake-2.png)

    ### Unapproved Post

    Where a post was not advertised on Handshake it **must go through an approvals process** to have it verified as suitable. To log an application, navigate to **Year Long Placements**, then **Applications**, then **External Applications** as shown below.

    ![img](/images/recruit/student/8-external-1.png)

    Then select **Log an External Application** as shown below

    ![img](/images/recruit/student/8-external-2.png)

    Complete the application form shown below. Please provide as much detail as possible. You must also upload a document containing suitable evidence that the post has been offered as a placement (copy of a job offer - letter/email etc).

    ![img](/images/recruit/student/8-external-3.png)

    ### Confirmation Email

    Once you have completed one of the above steps and your post has been approved, you will receive a confirmation email from Recruit as shown below.

    ![img](/images/recruit/student/8-confirm-email.png)

    >⚠️ **NOTE** You will only receive this email when your placement been approved

    ## Starting Placement

    Over the placement year you are working towards achievement of a Diploma in Professional Practice (DPP/DPP(I)).

    As part of your assessment during the placement year, you will have a number of submissions to carry out. These include:

        - [x] completion of placement details and health and safety forms
        - [x] completion and signing of a learning agreement
        - [x] completion and signing of an employer indemnity form
        - [x] maintenance of a placement journal
        - [x] completion of paperwork relating to placement visits
        - [x] submission of a final placement report.

    ### Placement Details

    You need to firstly confirm details regarding your placement that will be required by your placement tutor and academic supervisor during the placement, (company details, supervisor details, contact details, title of role, start-end dates etc) and revise accordingly

    ![img](/images/recruit/student/2-details.png)

    ### Health and Safety

    Your safety whilst on placement is of paramount importance and thus it is essential that you complete the ‘Health & Safety’ assessment form. In the case where an employer does not provide any H&S induction or training, this should be discussed with the employer and also with the academic placement visitor at the first placement visit.

    ![img](/images/recruit/student/2-hs.png)

    >⚠️  **NOTE:** Recruit will send reminder emails to students, until these actions are completed.

    ### *Learning agreement - TBC*

    You will complete the Learning Agreement Template (accessible via placement downloads - see below) and upload to Recruit.

    ![img]()

    ### *Employer Indemnity - TBC*

    Your employer will need to complete and sign the indemnity form (accessible via placement downloads - see below) and upload to Recruit.

    ![img]()

    ### Placement Downloads

    During the placement the student may be directed to various placement related documents. These are available in the Downloads section and examples are shown below.

    >⚠️ **Note:** the files available in downloads will vary from year to year and the list below is for demonstration purposes only

    ![img](/images/recruit/student/3-downloads.png)

    ### Placement Journal

    The Placement Journal provides a record of the experiences that you have gained and the learning that you have achieved.  It will be a valuable resource for you in the preparation of your Placement Report. It will be inspected by your Academic Visitor at each visit, and by the assessor of your Placement Report.

    To access the journal, under ‘Year Long Placements’ select ‘Submissions’, then click the ‘Placement Journal’ button.

    ![img](/images/recruit/student/4-journal-1.png)

    #### Journal listing

    Use a simple week number /date system to organise entries. Note the journal entries here are simply test data and not reflective of what a normal entry should contain. You can edit/delete a journal entry for up to 24 hours to correct mistakes. Refer to the placement handbook for guidance on journal entries.

    ![img](/images/recruit/student/4-journal-2.png)

    New journal entries can be added by clicking the Journal Entry button and then filling in the form shown below

    ![img](/images/recruit/student/4-journal-3.png)

    ## Placement Visits

    You can normally expect to be visited twice during your placement. The first visit will take place around November/December and the second visit around March/April. These dates may vary slightly depending on when your placement started.

    >⚠️ **NOTE** You must regularly check your University email account for communications from the placement team and your academic visitor and respond in a timely manner.

    At a visit, your academic visitor will normally:

    - Review your placement journal and placement work summary
    - Discuss your work and progress
    - Listen to any issues highlighted and attempt to resolve where possible
    - Discuss your performance with your line manager and any issues highlighed
    - Assess your achievement of the Placement Competencies
    - Give you feedback on your performance and progress

    ### Scheduled Visit

    Once an academic visitor has scheduled a placement visit on Recruit, the student and the industrial supervisor are automatically emailed (email includes a calendar ICS file attachment).

    ![img](/images/recruit/student/5-visit-1.png)

    ### Placement Work Summary

    The student should then upload the Placement Work Summary Form at least 48 hours before your first placement visit. Note the option to upload the form is not available until the academic supervisor schedules the visit **via Recruit**. If the upload does not appear then contact your academic supervisor and ask them to schedule the visit in Recruit.

    The Placement Work Summary Form template is available in the [downloads](/6-student-guidance/#placement-downloads) section.

    You can upload this document as often as required (over writing the original), up until the academic has submitted visit feedback and at which point the document can no longer be uploaded.

    ![img](/images/recruit/student/5-visit-2.png)

    ### Visit Feedback

    Once the visit has been completed the academic will upload their visit feedback and the student will receive and email alerting them to the fact that the feedback is now available.

    ![img](/images/recruit/student/5-visit-3.png)

    When you log in again you can no longer upload the First Visit Submission and instead can click the Visit view botton to review the feedback provided.

    ![img](/images/recruit/student/5-visit-4.png)

    You should reflect, in your Placement Journal, upon any feedback you have been given.

    ## Final Report

    In semester 2 (typically around the second placement visit) students will be contacted by email and provided with instructions regarding submission of the final placement report. A template for the report will be provided via email and/or via the Recruit [downloads](/6-student-guidance/#placement-downloads) area.

    ### Upload Report

     To upload the report select the `Upload Placement Report` button in the Submissions section.

    ![img](/images/recruit/student/6-report-1.png)

    Then upload the report (in pdf format). As noted, you should not upload the report until informed by the Placement Tutor. Typically report notifications are send out around late April, with report submissions to be made by end of May.

    ![img](/images/recruit/student/6-report-2.png)

    ### Feedback

    As per placement visit submissions, once the final report submission has been assessed/feedback provided, it can no longer be uploaded.

    >⚠️ **NOTE** Once report has been assessed the feedback is only visible in Recruit from 1st October.

    ![img](/images/recruit/student/7-feedback.png)
    EOD;

    private $recruit_academic = <<<EOD
    ## Introduction

    Placement Visitors should be mindful that placement visits are a crucial element of the Teaching and Learning process and as such, like lectures, tutorials etc., they are an important aspect of their academic workload. Placement visits provide an opportunity for the visiting academic to assess student learning and performance in the workplace and compare that with students on other placements.

    ## Visit Guidelines

    ### Discuss With Student

    The following items should be discussed with the student.

    - First Visit
    - Verify the Health & Safety Checklist has been completed on Recruit and if the student has noted any issues. If so, then these should be discussed at the visit .
    - Ensure the student is aware of the relevant company policy on Bullying & Harassment and that they know what to do if they think they are being bullied or harassed.
    - Ask the student if they have flagged any disability with the company, if so, has the company dealt with it in an appropriate manner? Students are not obliged to disclose any disability.
        - Under SENDO legislation employers must make reasonable adjustments to facilitate students with a range of disabilities including physical, visual, hearing, learning, medical and mental. (NB Do NOT ask the student directly if they have a disability)
    - Accommodation and travel to work

    - Both Visits
    - Review the students placement journal before the visit and provide some constructive feedback comments on content/structure/completeness.
    - Ask the student to outline a typical day’s/week’s work and get the student to elaborate on any interesting elements of the work carried out.
    - Discuss the training received software packages used etc.
    - Look for evidence of development of any of the placement competencies (independence, flexibility, timekeeping, teamwork, interpersonal skills, self-awareness, organisation and planning, health and safety awareness, social and professional awareness, technical expertise) and probe where necessary. This is important as you will need confirm that the student has achieved all the completencies by the completion of the second visit.
    - Ask students to reflect on the skills are they developing. This is particularly important and they should be asked to record reflective elements in their Placement Journal so that they can refer to this when completing the reflection section of the final report.

    ### Discuss with Supervisor

    The following items should be discussed with the industrial supervisor:

    - First Visit
    - Student Health & Safety induction (i.e. simply check it has happened by the first visit)
    - Company policy on Bullying & Harassment (i.e. check at first visit does a policy exist and was it covered at induction?). Has the student flagged any disability with the company? If so, has the company dealt with it in an appropriate manner? Students are not obliged to disclose any disability. Under SENDO legislation employers must make reasonable adjustments to facilitate students with a range of disabilities including physical, visual, hearing, learning, medical and mental.

    - Both Visits
    - Student’s strengths and weaknesses
    - Student’s progress to date
    - Assess the student’s performance
    - Potential for more demanding work (where deemed necessary)
    - Work programme for the rest of the year
    - Company placement requirements for next year (discuss at second visit)
    - Develop other Company – University Links

    ### Student Feedback

    - Following discussions with the Industrial supervisor, it’s important to let student know how he/she is performing. It is recommended that you provide some verbal feedback and let them know that the feedback form will be available via Recruit.

    - The final feedback/assessment form should be uploaded to Recruit (See Recruit for Academic Placement Visitors)

    ### Placement Competencies

    - Placement is assessed via a practical element (in job performance) and an academic element (final placement report). To pass the practical element, student should have achieved the 10 placement competencies by the end of the placement.

    - By the end of the first visit, it would be normal that students may have achieved a number of the competencies and others may be ‘work in progress’. Outstanding competencies provide the student with some goals to achieve by second visit. Students should not have achieved all competencies by end of first visit.

    - For example, it would be extremely abnormal to award a student the ‘Technical Expertise’ competency by end of first visit. Rather they would be provided with feedback to note that they are performing as expected and that you would fully expect them to have achieved the competency by the end of the placement.

    - In some exceptional cases where one or more competencies have not been met by the second visit, you should inform the student that you will be looking for additional evidence to support the competency claim in the final report. I would stress that this would be an extreme case and that to pass placement students must pass the practical placement element.

    ### Notable Points

    - It is widely agreed that an early visit is essential to ensure that students have settled into the workplace and any teething problems addressed immediately, otherwise, what were originally minor problems can explode into major issues if left to fester. There are also other problems which may arise outside the workplace which can cause considerable distress to students, home sickness, travel or accommodation problems or even financial issues which need to be readily addressed and form an important part of the visiting academic’s remit.

    - Students can feel lonely or isolated on placement and many have reported that the opportunity to talk to a “friendly face” is a very important aspect of the visits.

    - Placement Visitors may therefore be required to perform the role of Mentor, Counsellor and Assessor as well as the link between the employer and the University of Ulster.

    - Communication with the student during the placement is very important. The Placement Visitor must ensure that the student is fully aware of all contact details of appropriate University staff.

    - Employers find visits reassuring in that the student isn’t being “dumped” for a year with the company but instead the University is sharing the responsibility for the student’s learning experience in partnership with the employer. This helps to maintain the relationship between the employer and University and may lead to other opportunities such as consultancy or research.

    - Placement Visitors should be aware that visits are also opportunities:
    - for a learning or educational experience
    - to present the case for the following year's students and ensure continuity of the placement (usually during the second visit)
    - to maintain the relationship with the host organisation
    - to develop further links between the organisation and the university
    - to perform vital marketing and PR functions on behalf of the university.
    - Excellence and quality must also be prerequisites in the placement process, and it is essential that we provide a high-quality service to the student and the employer. We must strive for excellence, and now that students are paying higher fees for their placement year, they will come to demand it.

    ## Placement Visits

    ### Using Recruit

    An academic can login to Recruit via <https://recruit.ulster.ac.uk>, click the ‘Ulster Staff and Student Log In’ link and use their normal University email/password to authenticate. Recruit now utilises SSO and thus if you are already authenticated via email, portal etc then you will be automatically logged in.

    ![img](/images/recruit/academic/1-login.png)

    Once the login has been successful, the academic can select either ‘Placement Visits’ or ‘Report Marking’ menu option and will be presented with a list of their allocated students.

    ![img](/images/recruit/academic/2-home.png)

    For placement visits the allocation may look as follows

    ![img](/images/recruit/academic/3-allocation.png)

    Selecting the Review operation for one student provides access to further details on the student and their placement.

    ![img](/images/recruit/academic/4-review-student.png)

    Selecting ‘Review’ provides more details on the placement, including the contact details of the students industrial supervisor

    ![img](/images/recruit/academic/5-placement-details.png)

    The ‘Directions’ link provides a Google map based on the post code.

    ![img](/images/recruit/academic/6-map.png)

    The selected students ‘Health & Safety Checklist’ can be reviewed before the visit and issues addressed at the visit.

    ![img](/images/recruit/academic/7-hs.png)

    ### Schedule Visit

    Agree a date/time with the student via email then on Recruit click the ‘Schedule’ operation and complete the visit schedule form with any issues for discussion and enter the agreed visit date/time.

    ![img](/images/recruit/academic/8-schedule.png)

    Note the visit status and visit date are not set until the visit is scheduled.

    On submitting the schedule an email with attached calendar event is sent to the student, the work supervisor and copied to the academic (note this is just a sample email).

    ![img](/images/recruit/academic/9-schedule-email.png)

    Once the student has uploaded their pre-visit Placement Work Summary, it is visible to the academic via the “View Submission” links. In the event you had to upload a submission on behalf of the student, you can do so via the “Upload First/Second Visit Submission” links.

    ![img](/images/recruit/academic/10-view-submission.png)

    Note in example above both visits have been scheduled and students have submitted their placement work summaries.

    ### Journal

    Prior to completing a placement visit, the academic may review the students ‘Placement Journal’ and note any issues etc. for addressing at the visit. In the case where the student has not yet added any journal entries (as shown below), you should communicate with the student and request that they update the journal before the first visit.

    ![img](/images/recruit/academic/11-view-journal.png)

    ### Student Visit Feedback

    Once the visit has been completed the academic will upload the Placement Visit Feedback form, providing general feedback and indicating progression on the competencies and an indicated Attainment (Pass/Fail) – this is purely formative feedback. To access the feedback option select “Feedback” link from the relevant visit.

    ![img](/images/recruit/academic/12-feedback-1.png)

    Then complete the form shown below (attach the competency feedback form)

    ![img](/images/recruit/academic/12-feedback-2.png)

    Following submission of feedback, the student receives an email so they know to review the feedback and take action where needed.

    ![img](/images/recruit/academic/12-feedback-3.png)

    ### Overall Assessment

    It is essential, that following the second visit, the academic visitor should record the overall result (pass/fail) for the practical element of the placement. This can be recorded via the assessment menu as shown below.

    ![img](/images/recruit/academic/13-second-visit-1.png)

    The assessment feature has to accommodate the two University assessment regimes and in our case we will ignore the % Mark awarded by the Academic Visitor and % Mark awarded by the Industrial Supervisor elements and concentrate on the Industrial Verdict element.

    ![img](/images/recruit/academic/13-second-visit-2.png)

    ## Final Report

    To access your allocated placement reports, login to [Recruit](https://recruit.ulster.ac.uk) and select Report Marking.

    ![img](/images/recruit/academic/20-report-marking.png)

    You will be presented with a list of students you have been allocated for the report marking process.

    ![img](/images/recruit/academic/21-report-list.png)

    Click “View Report” to view (and download) the submitted student placement Report for each student.

    >⚠️ **Note:** Only the first marker can view a students report submission. You must therefore email a copy of the report to the second marker.

    ### Report Grade Sheet

    Each marker completes an individual placement report grade sheet, providing a grade for each achievement area and an overall grade (based on the grade table at the end of the form). Please only use the grade descriptors ( F - Fail, P - Pass, C- Commendation, D- Distinction) on the grade sheet and **do not use actual marks/percentages**.

    Both markers then agree an overall agreed grade and both write this in the relevant box in their individual forms. Where there is a difference of opinion in the grades allocated, please articulate in the feedback section, how the agreed grade was arrived at. Please note that these grade sheets are made available to the students when they return to final year.

    ### Assessment Feedback

    The first marker is then responsible for uploading the feedback and adding the overall placement grade. To do this click “Assess” against the relevant student.

    ![img](/images/recruit/academic/22-assess-1.png)

    Complete the form below, ensuring

    1. You select the relevant overall agreed assessment grade (Fail, Pass, Commendation, Distinction) in the Status field dropdown menu.
    2. Complete the feedback as shown below.
    3. Then click the Browse button to select and upload a single PDF document containing the two assessment sheets (two individual) and a CV comment sheet if required (see CV review below).
    4. Once the document has been selected click submit to complete the assessment.
    Note the document can be submitted multiple times and each submission simply overwrites the previous.

    ![img](/images/recruit/academic/22-assess-2.png)

    When the report is assessment is submitted the status changes to reflect the agreed assessment and the student can no longer resubmit. Feedback is visible to the student from 1st October, which allows sufficient time for marks to be processed via the August exam boards.

    ![img](/images/recruit/academic/22-assess-3.png)

    ### CV Review

    Students may submit an up-to-date copy of their CV (as an appendix to the report). Whilst the CV is not part of the assessment, the first marker should review any CV submitted and complete the CV comment sheet. This should be appended to the single report assessment feedback document before submission to Recruit.

    EOD;

}
