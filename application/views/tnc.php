
<style>
.tncheading{
background: #043d5b;color: white;padding: 7px 45px;border-radius:2px 15px;margin-top: 20px;   
}
#searchBTN {
    width: 100%;
    padding: 12px;
    border: none;
    background-color: #9bc03c;
    color: white;
    margin-top: 5px;
    font-size: 16px;
    border-radius: 2px 2px 18px 0px;
}
</style>
<?php include ("includes/header_new.php"); ?>
<div class="careplus-banner">
<div class="container-fluid">
            <div class="row">
		

<div class="clearfix"></div>

<form action='<?=base_url();?>search' method='GET'>
                <div class="box-form">
                      
      
                    <div class="col-sm-2 col-sm-offset-1">
                        <div class="input-group shadow">
                            <span class="input-group-addon"> <i class="fa fa-map-marker"> &nbsp; &nbsp; </i></span>
                            <input type="text" class="form-control ui-autocomplete-input" name="location" placeholder="Location" id="hintcity" autocomplete="off">
                            <input type="hidden" class="form-control" name="city" id="city">
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="input-group shadow">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" id="hint" class="form-control ui-autocomplete-input" name="keyword" placeholder="Search Hospitals/Doctors/Clinics etc" autocomplete="off">
                        </div>
                        
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group shadow">
                            <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
                            <select class="form-control" name="spl">
              <option value="">-Specialization-</option>
                                              <?php foreach($specialization as $s){ ?>
                                <option value='<?=$s->id;?>'><?=$s->name;?></option>
							<?php } ?>
                                               
                            </select>
                        </div>
                        
                    </div>
            <div class="col-sm-1">
                <button class="careplus-booking-btn careplus-bgcolor-two" id="searchBTN"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>




                    <div class="clearfix"></div>
                </div>
                </form>
                
            </div>
            
 <div class="clearfix"></div>



                <div class="container">
                            <div class="row">
                               
                                <!--  <img src="images/logo.png" class="centerLogo">  -->
                            </div>


                              <div class="col-md-12" style="padding:32px 17px;background:white;border:0px solid #245a73;border-radius: 37px;box-shadow: 2px 2px 6px 1px #245a73;color:black;margin-top: 16px;">  

                              <div class="">
                                <h3 class="text-center" style="color:#295771;"><b>TERM AND CONDITIONS</b></h3>

<h6 class="tncheading"><b> <b/><i class="fas fa-quote-left"></i> CONDITIONS OF USE</h6>
<p>You must be 18 years of age or older to register, use the Services, or visit or use the Website in any manner. By registering, visiting and using the Website or accepting this Agreement, you represent and warrant to Upchar that you are 18 years of age or older, and that you have the right, authority and capacity to use the Website and the Services available through the Website, and agree to and abide by this Agreement.</p>


<h6 class="tncheading"><b><b/><i class="fas fa-quote-left"></i> TERMS OF USE APPLICABLE TO ALL USERS OTHER THAN PRACTITIONERS</h6>

<p>The terms in this Clause 3 are applicable only to Users other than Practitioners.</p>

<ul>
  <li>
<i class=" fas fa-check"></i> END-USER ACCOUNT AND DATA PRIVACY    
  </li>
  <li><i class="fas fa-check"></i> The terms “personal information” and “sensitive personal data or information” are defined under the SPI Rules, and are reproduced in the Privacy Policy.</li>

<li><i class="fas fa-check"></i> Upchar may by its Services, collect information relating to the devices through which you access the Website, and anonymous data of your usage. The collected information will be used only for improving the quality of Upchar’s services and to build new services.</li>

<li><i class="fas fa-check" style=" "></i> The Website allows Upchar to have access to registered Users’ personal email or phone number, for communication purpose so as to provide you a better way of booking appointments and for obtaining feedback in relation to the Practitioners and their practice.</li>

<li><i class="fas fa-check" style=" "></i> The Privacy Policy sets out, inter-alia:</li>
<li><i class="fas fa-check" style=" "></i> The type of information collected from Users, including sensitive personal data or information;</li>
<li><i class="fas fa-check" style=" "></i> The purpose, means and modes of usage of such information;</li>
<li><i class="fas fa-check" style=" "></i> How and to whom Upchar will disclose such information; and,</li>
<li><i class="fas fa-check" style=" "></i> Other information mandated by the SPI Rules.</li>

<li><i class="fas fa-check" style=" "></i> The User is expected to read and understand the Privacy Policy, so as to ensure that he or she has the knowledge of, inter-alia:</li>
<li><i class="fas fa-check" style=" "></i> The fact that certain information is being collected.</li>
<li><i class="fas fa-check" style=" "></i> The purpose for which the information is being collected;</li>
<li><i class="fas fa-check" style=" "></i> The intended recipients of the information;</li>
<li><i class="fas fa-check" style=" "></i> The nature of collection and retention of the information; and</li>
<li><i class="fas fa-check" style=" "></i> The name and address of the agency that is collecting the information and the agency that will retain the information; and</li>
<li><i class="fas fa-check" style=" "></i> The various rights available to such Users in respect of such information.</li>

<li><i class="fas fa-check" style=" "></i> Upchar shall not be responsible in any manner for the authenticity of the personal information or sensitive personal data or information supplied by the User to Upchar or to any other person acting on behalf of Upchar.</li>
<li><i class="fas fa-check" style=" "></i> The User is responsible for maintaining the confidentiality of the User’s account access information and password, if the User is registered on the Website. The User shall be responsible for all usage of the User’s account and password, whether or not authorized by the User. The User shall immediately notify Upchar of any actual or suspected unauthorized use of the User’s account or password. Although Upchar will not be liable for your losses caused by any unauthorized use of your account, you may be liable for the losses of Upchar or such other parties as the case may be, due to any unauthorized use of your account.</li>

<li><i class="fas fa-check" style=" "></i> If a User provides any information that is untrue, inaccurate, not current or incomplete (or becomes untrue, inaccurate, not current or incomplete), or Upchar has reasonable grounds to suspect that such information is untrue, inaccurate, not current or incomplete,Upchar has the right to discontinue the Services to the User at its sole discretion.</li>

<li><i class="fas fa-check" style=" "></i> Upchar may use such information collected from the Users from time to time for the purposes of debugging customer support related issues.</li>

<li><i class="fas fa-check" style=" "></i> Against every Practitioner listed in Upchar.com, you may see a ‘show number’ option. When you choose this option, you choose to call the number through a free telephony service provided by Upchar, and the records of such calls are recorded and stored in Upchar’s servers. Such records are dealt with only in accordance with the terms of the Privacy Policy. Such call facility provided to you by Upchar should be used only for appointment and booking purposes, and not for consultation on health-related issues. Upchar accepts no liability if the call facility is not used in accordance with the foregoing.</li>


</ul>


    <h6 class="tncheading"><b><b/><i class="fas fa-quote-left"></i> RELEVANCE ALGORITHM</h4>

<p class="text-center">Upchar’s relevance algorithm for the Practitioners is a fully automated system that lists the Practitioners, their profile and information regarding their Practice on its Website. These listings of Practitioners do not represent any fixed objective ranking or endorsement by Upchar. Upchar will not be liable for any change in the relevance of the Practitioners on search results, which may take place from time to time. The listing of Practitioners will be based on automated computation of the various factors including inputs made by the Users including their comments and feedback. Such factors may change from time to time, in order to improve the listing algorithm. Upchar in no event will be held responsible for the accuracy and the relevancy of the listing order of the Practitioners on the Website.</p>

 <h6 class="tncheading"><b><b/> <i class="fas fa-quote-left"></i>  LISTING CONTENT AND DISSEMINATING INFORMATION</h6>

<ul>
  <li><i class="fas fa-check" style=" "></i> Upchar collects, directly or indirectly, and displays on the Website, relevant information regarding the profile and practice of the Practitioners listed on the Website, such as their specialization, qualification, fees, location, visiting hours, and similar details. Upchar takes reasonable efforts to ensure that such information is updated at frequent intervals. Although Upchar screens and vets the information and photos submitted by the Practitioners, it cannot be held liable for any inaccuracies or incompleteness represented from it, despite such reasonable efforts.</li>

<li><i class="fas fa-check" style=" "></i> The Services provided by Upchar or any of its licensors or service providers are provided on an "as is" and “as available’ basis, and without any warranties or conditions (express or implied, including the implied warranties of merchantability, accuracy, fitness for a particular purpose, title and non-infringement, arising by statute or otherwise in law or from a course of dealing or usage or trade). Upchar does not provide or make any representation, warranty or guarantee, express or implied about the Website or the Services. Upchar does not guarantee the accuracy or completeness of any content or information provided by Users on the Website. To the fullest extent permitted by law, Upchar disclaims all liability arising out of the User’s use or reliance upon the Website, the Services, representations and warranties made by other Users, the content or information provided by the Users on the Website, or any opinion or suggestion given or expressed by Upchar or any User in relation to any User or services provided by such User.</li>

<li><i class="fas fa-check" style=" "></i> The Website may be linked to the website of third parties, affiliates and business partners. Upchar has no control over, and not liable or responsible for content, accuracy, validity, reliability, quality of such websites or made available by/through our Website. Inclusion of any link on the Website does not imply that Upchar endorses the linked site. User may use the links and these services at User’s own risk.</li>

<li><i class="fas fa-check" style=" "></i> Upchar assumes no responsibility, and shall not be liable for, any damages to, or viruses that may infect User’s equipment on account of User’s access to, use of, or browsing the Website or the downloading of any material, data, text, images, video content, or audio content from the Website. If a User is dissatisfied with the Website, User’s sole remedy is to discontinue using the Website.</li>
<li><i class="fas fa-check" style=" "></i> If Upchar determines that you have provided fraudulent, inaccurate, or incomplete information, including through feedback, Upchar reserves the right to immediately suspend your access to the Website or any of your accounts with Upchar and makes such declaration on the website alongside your name/your clinic’s name as determined by Upchar for the protection of its business and in the interests of Users. You shall be liable to indemnify Upchar for any losses incurred as a result of your misrepresentations or fraudulent feedback that has adversely affected Upchar or its Users.</li>

<li><i class="fas fa-check" style=" "></i> The information published under the head of "Industry wide city-wise Pricing Graph" is derived from a benchmarking group that is determined to be relevant by Upchar in the relevant city. Upchar has published this information for guidance purpose and does not have the ability to ascertain accuracy of the data based on which the information has been published and nor does it have any duty to disclose to anyone the source of the underlying data sets based on which this information has been published. Upchar is not liable in any manner for any consequence whatsoever arising out of any use of the information published here.</li>


 <h6 class="tncheading"><b> <b/> <i class="fas fa-quote-left"></i>  BOOK APPOINTMENT AND CALL FACILITY</h6>
<p>Upchar enables Users to connect with Practitioners through two methods: a) Book facility that allows Users book an appointment through the Website; b) Value added telephonic services which connect Users directly to the Practitioner’s number provided on the Website.</p>
<li><i class="fas fa-check" style=" "></i> Upchar will ensure Users are provided confirmed appointment on the Book facility. However, Upchar has no liability if such an appointment is later cancelled by the Practitioner, or the same Practitioner is not available for appointment. Provided, it does not fall under the heads listed under the Upchar Guarantee Program, in which case the terms of this program shall apply.</li>
<li><i class="fas fa-check" style=" "></i>
  If a User has utilized the telephonic services, Upchar reserves the right to share the information provided by the User with the Practitioner and store such information and/or conversation of the User with the Practitioner, in accordance with our Privacy Policy.
</li>
<li><i class="fas fa-check" style=" "></i> The results of any search Users perform on the Website for Practitioners should not be construed as an endorsement by Upchar of any such particular Practitioner. If the User decides to engage with a Practitioner to seek medical services, the User shall be doing so at his/her own risk.</li>
<li><i class="fas fa-check" style=" "></i> Without prejudice to the generality of the above, Upchar is not involved in providing any healthcare or medical advice or diagnosis and hence is not responsible for any interactions between User and the Practitioner. User understands and agrees that Upchar will not be liable for:</li>
<li><i class="fas fa-check" style=" "></i> User interactions and associated issues User has with the Practitioner;</li>
<li><i class="fas fa-check" style=" "></i> The ability or intent of the Practitioner(s) or the lack of it, in fulfilling their obligations towards Users.</li>
<li><i class="fas fa-check" style=" "></i> Any wrong medication or quality of treatment being given by the Practitioner(s), or any medical negligence on part of the Practitioner(s);</li>
<li><i class="fas fa-check" style=" "></i> Inappropriate treatment, or similar difficulties or any type of inconvenience suffered by the User due to a failure on the part of the Practitioner to provide agreed Services;</li>
<li><i class="fas fa-check" style=" "></i> Any misconduct or inappropriate behaviour by the Practitioner or the Practitioner’s staff;</li>
<li><i class="fas fa-check" style=" "></i> cancellation or no show by the Practitioner or rescheduling of booked appointment or any variation in the fees charged, provided these have been addressed to under, Upchar Guarantee Program.</li>
<li><i class="fas fa-check" style=" "></i> Users are allowed to provide feedback about their experiences with the Practitioner, however, the User shall ensure that, the same is provided in accordance with applicable law. User however understands that, Upchar shall not be obliged to act in such manner as may be required to give effect to the content of Users feedback, such as suggestions for delisting of a particular Practitioner from the Website.</li>
<li><i class="fas fa-check" style=" "></i> In case of a ‘Patient-No-Show (P.N.S)’ (defined below), where the User does not show-up at the concerned Practitioner’s clinic:
User’s account will be temporarily disabled from booking further online appointments on Upchar.com for next four (4) months, in case of, three(3) Valid PNS, as per the Patient-No-Show Policy. However, the User can continue to call the clinic via Upchar.com to get an appointment.</li>

<li><i class="fas fa-check" style=" "></i> Patient- No-Show (P.N.S) for the purposes of these Terms and Conditions, is defined as, any instance where a User, who booked an appointment on the Website using the Book Appointment facility , has not turned up for the appointment without cancelling, rescheduling, or informing the Practitioner in advance about the same. When Practitioner informs Upchar of the incident or marks a particular appointment as P.N.S. using the Upchar Ray software or Upchar Pro App within five (5) days of the scheduled appointment, an email and SMS (“PNS Communication”) will be sent to the User to confirm on the incident with reasons. Where the User is not able to establish that the User had a legitimate reason as per Clause 3.4.6(c), for not showing up, Upchar shall be entitled to take actions as under Clause 3.4.6 (a). However Users understand that, actions such as ones mentioned under Clause 3.4.6(a) are included as a deterrent to stop Users from misusing the Website, and the loss of business hours incurred by the Practitioner.</li>
<li><i class="fas fa-check" style=" "></i> Following instances, solely at the discretion of Upchar, would be construed as valid cases of PNS (“Valid PNS”), in which case the User shall be penalized as per Clause 3.4.6 (a):</li>
<li><i class="fas fa-check" style=" "></i> User does not reply within seven (7) days, with reasons to PNS Communication, from the date of receipt of such PNS Communication;</li>
<li><i class="fas fa-check" style=" "></i> In case User responds to the PNS Communication with below reasons:</li>
<li><i class="fas fa-check" style=" "></i> Forgot the appointment</li>
<li><i class="fas fa-check" style=" "></i> Chose to visit another Practitioner/consulted online;</li>
<li><i class="fas fa-check" style=" "></i> Busy with other work; or such other reasons (which Upchar at its discretion decides to be a valid reason to not show up).</li>
<li><i class="fas fa-check" style=" "></i> Where the User has booked a paid appointment and is unable to visit the Practitioner, due to such genuine reasons of sickness etc. at the sole discretion of Upchar, pursuant to conducting of investigation, the User shall be provided with a refund of such payment made by User, at the time of booking. However, where cancellation charges have been levied, you would not be entitled to complete refund.</li>
<li><i class="fas fa-check" style=" "></i> Upchar reserves the right to make the final decision in case of a conflict. The total aggregate liability of Upchar with respect to any claims made herein shall be INR 200.</li>
<li><i class="fas fa-check" style=" "></i> Cancellation and Refund Policy</li>
<li><i class="fas fa-check" style=" "></i> In the event that, the Practitioner with whom User has booked a paid appointment via the Website, has not been able to meet the User, User will need to write to us at support@Upchar.com within five (5) days from the occurrence of such event; in which case, the entire consultation amount as mentioned on the Website will be refunded to the User within the next five (5) to six (6) business days in the original mode of payment done by the User while booking. In case where the User, does not show up for the appointment booked with a Practitioner, without cancelling the appointment beforehand, the amount will not be refunded, and treated as under Clause 3.4.6. However, where cancellation charges have been levied (as charged by the Practitioner/Practice), you would not be entitled to complete refund even if you have cancelled beforehand.</li>
<li><i class="fas fa-check" style=" "></i> Users will not be entitled for any refunds in cases where, the Practitioner is unable to meet the User at the exact time of the scheduled appointment time and the User is required to wait, irrespective of the fact whether the User is required to wait or choose to not obtain the medical services from the said Practitioner.</li>
</ul>

<h6 class="tncheading"><b><i class="fas fa-quote-left"></i>  NO DOCTOR-PATIENT RELATIONSHIP NOT FOR EMERGENCY USE<b/> </h6>

<ul>
<li><i class="fas fa-check" style=" "></i> Please note that some of the content, text, data, graphics, images, information, suggestions, guidance, and other material (collectively, “Information”) that may be available on the Website (including information provided in direct response to your questions or postings) may be provided by individuals in the medical profession. The provision of such Information does not create a licensed medical professional/patient relationship, between Upchar and you and does not constitute an opinion, medical advice, or diagnosis or treatment of any particular condition, but is only provided to assist you with locating appropriate medical care from a qualified practitioner.</li>  
<li><i class="fas fa-check" style=" "></i> It is hereby expressly clarified that, the Information that you obtain or receive from Upchar, and its employees, contractors, partners, sponsors, advertisers, licensors or otherwise on the Website is for informational purposes only. We make no guarantees, representations or warranties, whether expressed or implied, with respect to professional qualifications, quality of work, expertise or other information provided on the Website. In no event shall we be liable to you or anyone else for any decision made or action taken by you in reliance on such information.</li>
<li><i class="fas fa-check" style=" "></i> The Services are not intended to be a substitute for getting in touch with emergency healthcare. If you are an End-User facing a medical emergency (either on your or a another person’s behalf), please contact an ambulance service or hospital directly.</li>
</ul>

<h6 class="tncheading"><b> <b/> <i class="fas fa-quote-left"></i>  UPCHAR CONSULT</h6>
<ul>
  <li><i class="fas fa-check" style=" "></i>Definition.</li>
</ul>


<p class="text-center">Upchar's Consult is a feature owned and provided by Upchar that allows Users & Practitioners to communicate, either on unpaid mode or on paid mode, depending on the option chosen by the User. Further, Users may access this feature on Upchar’s platform to get assigned, for the purposes of consultation, to a Practitioner whereby such Practitioners are, by default, assigned through the system’s algorithm/software-program that finds the most available and accepting Practitioner or Users may choose Practitioners of choice through the search options made available on Upchar’s Website. The scope of this feature as detailed herein is collectively referred to as "Consult".</p>

<ul>
  <li><i class="fas fa-check" style=" "></i> Terms for Users:</li>
</ul>

<p>The Users expressly understand, acknowledge and agree to the following set forth herein below:</p>

<ul>
  <li><i class="fas fa-check" style=" "></i> In the event the Users intend to consult a specific Practitioner of choice, the same is facilitated through search options as made available on Upchar’s Website. In cases where Users cannot choose a Practitioner (due to system setup), the system uses an algorithm/software-program to find the most available and accepting Practitioner.</li>
  <li><i class="fas fa-check" style=" "></i> In case any prescription is being provided to User by the Practitioner, the same is being provided basis the online consultation, however it may vary when examined in person, hence in no event shall the prescription provided by Practitioners be relied as a final and conclusive solution.</li>
</ul>


<ul>
  <li><i class="fas fa-check" style=" "></i> The Users agree to use the advice from Practitioner on the website pursuant to:</li>
<li><i class="fas fa-check" style=" "></i> a) an ongoing treatment with their medical practitioner;</li>
<li><i class="fas fa-check" style=" "></i> b) a condition which does not require emergency treatment, physical examination or medical attention.</li>
<li><i class="fas fa-check" style=" "></i> c) medical history available as records with them for reference;</li>
<li><i class="fas fa-check" style=" "></i> d) a record of physical examination and report thereof with them, generated through their local medical practitioner.</li>
<li><i class="fas fa-check" style=" "></i> e) consultation with their medical practitioner before abandoning or modifying their ongoing treatment.</li>

<li><i class="fas fa-check" style=" "></i>
  The User agrees that by using Consult, the Practitioners on Consult will not be conducting physical examination of the Users, hence they may not have or be able to derive important information that is usually obtained through a physical examination. User acknowledges and agrees that the User is aware of this limitation and agrees to assume the complete risk of this limitation.
</li>
<li><i class="fas fa-check" style=" "></i> The User understands that Consult shall not form a substitute for treatment that otherwise needs physical examination/immediate consultation.</li>
<li><i class="fas fa-check" style=" "></i> During the consultation and thereafter, the Practitioner may upload the prescription/health records of the User on the account of the User for access of the User.</li>
<li><i class="fas fa-check" style=" "></i> Notwithstanding anything contained herein, Upchar in no manner endorses any Practitioner(s) that Users consult and is not in any manner responsible for any drug/medicines prescribed or the therapy prescribed by the Practitioner.</li>
<li><i class="fas fa-check" style=" "></i> If Practitioner responds to the User’s query, the system could trigger communications to the User, in the form of notification/text/email/others. The User further understands that Upchar may send such communications like text messages/email/calls before and/or after Practitioner’s consultation (physical or online) to User’s mobile number which is provided by Practitioner, based on the Practitioner’s settings. However and notwithstanding anything to the contrary in this Agreement, Upchar does not take responsibility for timeliness of such communications.</li>
<li><i class="fas fa-check" style=" "></i> Consult, is merely a consulting model, any interactions and associated issues with the Practitioner on Consult including but not limited to the User’s health issues and/or the User’s experiences is strictly between the User and the Practitioner. The User shall not hold Upchar responsible for any such interactions and associated issues.</li>
<li><i class="fas fa-check" style=" "></i> The User hereby grants consent to Upchar to feature certain of Users queries posted free of cost and respective Practitioners’ responses as posted by the User on Upchar Consult. Users further agree that any such information provided by the User will be subject to Upchar Privacy Policy.</li>
<li>There is a follow-up feature that is made available on one of Upchar’s product - Upchar Ray, through which the Practitioner can notify the User of a follow-up facility that is available post their in-person consultation. The Practitioner can define the duration and limit of messages that are available to the User for free. When the User starts the follow-up, a chat window opens up for consultation with the Practitioner for a certain period (set by the Practitioner) without having to make any payment. Upon expiry, an option to pay and restart option is available to the User. This enables the User to pay and initiate a paid consultation with the Practitioner.</li>
<li><i class="fas fa-check" style=" "></i> Any conversations that the Users have had with the Practitioner will be retained in Upchar database as per the applicable laws and subject to confidentiality.</li>
<li><i class="fas fa-check" style=" "></i> User understands and agrees to provide accurate information, and will not use this platform for any acts that are considered to be illegal in nature.</li>
<li><i class="fas fa-check" style=" "></i>  If User decides to engage with a Practitioner to procure medical services or engages in communication, exchange of money for services outside of Consult platform, User shall do so at their own risk. Upchar shall not be responsible for any breach of service or service deficiency by any Practitioner.</li>
<li><i class="fas fa-check" style=" "></i> The User shall be bound by the jurisdiction as contained in these Terms and Conditions hereunder, at all times, irrespective of the location they may be consulting with Practitioners online.</li>
<li><i class="fas fa-check" style=" "></i> The User shall indemnify and hold harmless Upchar and its affiliates, subsidiaries, directors, officers, employees and agents from and against any and all claims, proceedings, penalties, damages, loss, liability, actions, costs and expenses (including but not limited to court fees and attorney fees) arising due to or in relation to the use of Website by the User, by breach of the Terms or violation of any law, rules or regulations by the User, or due to such other actions, omissions or commissions of the User that gave rise to the claim.</li>
<li><i class="fas fa-check" style=" "></i>If User decides to use the payment gateway to make payments online, it is solely at User's discretion. Should there be any issues with regard to the payment not reaching the respective Practitioner’s account, please reach out to support@Upchar.com.</li>
</ul>


<h6 class="tncheading"><b><b/> <i class="fas fa-quote-left"></i>  Cancellation and Refund Policy:</h6>
<ul>
<li><i class="fas fa-check" style=" "></i> For cancellation and refund policy, <a href="#">read more</a>.</li>
</ul>


<h6 class="tncheading"><b><b/> <i class="fas fa-quote-left"></i>  Express Disclaimers:</h6>
<ul>
<li><i class="fas fa-check" style=" "></i> Consult is intended for general purposes only and is not meant to be used in emergencies/serious illnesses requiring physical consultation. Further, if the Practitioner adjudges that a physical examination would be required and advises ‘in-person consultation’, it is the sole responsibility of the User, to book an appointment for physical examination and in-person consultation whether the same is with the Practitioner listed on the Website or otherwise. In case of any negligence on the part of the User in acting on the same and the condition of the User deteriorates, Upchar shall not be held liable.</li>
<li><i class="fas fa-check" style=" "></i> Upchar is not a medical service provider, nor is it involved in providing any healthcare or medical advice or diagnosis, it shall hence not be responsible and owns no liability to either Users or Practitioners for any outcome from the consultation between the User and the Practitioner.</li>
<li><i class="fas fa-check" style=" "></i> Consult is a platform being made available to Users to assist them to obtain consultation from Practitioners and does not intend to replace the physical consultation with the Practitioner.</li>

</ul>

<h6 class="tncheading"><b> <b/> <i class="fas fa-quote-left"></i>  Terms for Practitioners:</h6>
<ul>
<li><i class="fas fa-check" style=" "></i> The Practitioner shall promptly reply to the User after receiving User’s communication. In case of non-compliance with regard to adhering to the applicable laws/rules/regulations/guidelines by the Practitioner, Upchar shall have the right to replace such Practitioners for the purpose of consultation to the User or remove such Practitioners from the platform/Upchar application/site; Read more on guidelines here.</li>
<li><i class="fas fa-check" style=" "></i> The Practitioner understands and agrees that, Upchar shall at its sole discretion, at any time be entitled to, show as other Practitioners available for consultation.</li>
<li><i class="fas fa-check" style=" "></i> The Practitioner further understands that, there is a responsibility on the Practitioner to treat the User, paripassu, as the Practitioner would have otherwise treated the User on a physical one-on-one consultation model.</li>
<li><i class="fas fa-check" style=" "></i> The Practitioner has the discretion to cancel any consultation at any point in time in cases where the Practitioner feels, it is beyond his/her expertise or his/her capacity to treat the User. In such cases, it may trigger a refund to the User and the User has the option of choosing other Practitioners. However, it is strongly recommended that the Practitioner advise the User and explain appropriately for next steps.</li>
<li><i class="fas fa-check" style=" "></i> The Practitioner shall at all times ensure that all the applicable laws that govern the Practitioner shall be followed and utmost care shall be taken in terms of the consultation being rendered.</li>
<li><i class="fas fa-check" style=" "></i>The Practitioner acknowledges that should Upchar find the Practitioner to be in violation of any of the applicable laws/rules/ regulations/guidelines set out by the authorities then Upchar shall be entitled to cancel the consultation with such Practitioner or take such other legal action as may be required.</li>
<li><i class="fas fa-check" style=" "></i>The payment gateway option is being provided to the Users to make payment easier. In case wrong bank account details are provided by Practitioner, Upchar will not be responsible for loss of money, if any. In case of there being any technical failure, at the time of transaction and there is a problem in making payment, you could contact support@Upchar.com.</li>
<li><i class="fas fa-check" style=" "></i>It is further understood by the Practitioner that the information that is disclosed by the User at the time of consultation is personal information and is subject to all applicable privacy laws, shall be confidential in nature and subject to User and Practitioner privilege.</li>
<li><i class="fas fa-check" style=" "></i>The Practitioner understands that the certain Consult features (such as follow-up feature) shall be available only if the same has been enabled by the Practitioner and that the maximum number of messages that Practitioner can send and the number of days for which follow-up will be active for, shall be as set by the Practitioner.</li>
<li><i class="fas fa-check" style=" "></i>The Practitioner understands that when a User books a time-slot with the Practitioner for online consultation, the Practitioner must comply with the time slot to the best of their availability. In case of delay, the doctor must notify User to their best possible ability.</li>
<li><i class="fas fa-check" style=" "></i>The Practitioner understands that Upchar makes no promise or guarantee for any uninterrupted communication and the Practitioner shall not hold Upchar liable, if for any reason the communication is not delivered to the User(s), or are delivered late or not accessed, despite the efforts undertaken by Upchar.</li>
<li><i class="fas fa-check" style=" "></i>It shall be the responsibility of the Practitioner to ensure that the information provided by User is accurate and not incomplete and understand that Upchar shall not be liable for any errors in the information included in any communication between the Practitioner and User.</li>
<li><i class="fas fa-check" style=" "></i>The Practitioner shall indemnify and hold harmless Upchar and its affiliates, subsidiaries, directors, officers, employees and agents from and against any and all claims, proceedings, penalties, damages, loss, liability, actions, costs and expenses (including but not limited to court fees and attorney fees) arising due to the services provided by Practitioner, violation of any law, rules or regulations by the Practitioner or due to such other actions, omissions or commissions of the Practitioner that gave rise to the claim.</li>
<li><i class="fas fa-check" style=" "></i>Read more on Settlement Policy here.</li>

</ul>


<h6 class="tncheading"><b> <b/> <i class="fas fa-quote-left"></i>  UPCHAR HEALTH FEED:</h6>

<ul>
  <li><i class="fas fa-check" style=" "></i>Upchar Health feed is an online content platform available on the website, wherein Practitioners who have created a Upchar profile and Users who have created a health account can login and post health and wellness related content</li>
<li><i class="fas fa-check" style=" "></i>A User can use Upchar Health feed by logging in from their health account, creating original content comprising text, audio, video, images, data or any combination of the same (“Content”), and uploading said Content to Upchar’s servers. Upchar will make available to the User a gallery of images licensed by Upchar from a third party stock image provider (“Upchar Gallery”). The User can upload their own images or choose an image from the Upchar Gallery. Upchar does not provide any warranty as to the ownership of the intellectual property in the Upchar Gallery and the User acknowledges that the User will use the images from the Upchar Gallery at their own risk. Upchar shall post such Content to Upchar Health feed at its own option and subject to these Terms and Conditions. The Content uploaded via Upchar Health feed does not constitute medical advice and may not be construed as such by any person.</li>
<li><i class="fas fa-check" style=" "></i>The User acknowledges that they are the original authors and creators of any Content uploaded by them via Upchar Health feed and that no Content uploaded by them would constitute infringement of the intellectual property rights of any other person. Upchar reserves the right to remove any Content which it may determine at its own discretion as violating the intellectual property rights of any other person. The User agrees to absolve Upchar from and indemnify Upchar against all claims that may arise as a result of any third party intellectual property right claim that may arise from the user’s uploading of any Content on Upchar Health feed. The User may not use the images in the Upchar Gallery for any purpose other than those directly related to the creation and uploading of Content to Upchar Health feed. The User also agrees to absolve Upchar from and indemnify Upchar against all claims that may arise as a result of any third party intellectual property claim if the User downloads, copies or otherwise utilizes an image from the Upchar Gallery for his/her personal or commercial gain.</li>
<li><i class="fas fa-check" style=" "></i>The user hereby assigns to Upchar, in perpetuity and worldwide, all intellectual property rights in any Content created by the User and uploaded by the User via Upchar Health feed.</li>
<li><i class="fas fa-check" style=" "></i>Upchar shall have the right to edit or remove the Content and any comments in such manner as it may deem Upchar Health feed at any time.</li>
<li><i class="fas fa-check" style=" "></i>The User agrees not to upload Content which is defamatory, obscene or objectionable in nature and Upchar reserves the right to remove any Content which it may determine at its own discretion to violate these Terms and Conditions or be violative of any law or statute in force at the time. The User agrees to absolve Upchar from and indemnify Upchar against all claims that may arise as a result of any legal claim arising from the nature of the Content posted by the User on Upchar Health Feed.</li>
<li><i class="fas fa-check" style=" "></i>A User may also use Upchar Health feed in order to view original content created by Practitioners and to create and upload comments on such Content, where allowed.</li>
<li><i class="fas fa-check" style=" "></i>User acknowledges that the Content on Upchar Health feed reflects the views and opinions of the authors of such Content and do not necessarily reflect the views of Upchar.</li>
<li><i class="fas fa-check" style=" "></i>User agrees that the content they access on Upchar Health feed does not in any way constitute medical advice and that the responsibility for any act or omission by the User arising from the User’s interpretation of the Content, is solely attributable to the user. The User agrees to absolve Upchar from and indemnify Upchar against all claims that may arise as a result of the User’s actions resulting from the User’s viewing of Content on Upchar Health feed.</li>
<li><i class="fas fa-check" style=" "></i>The User acknowledges that all intellectual property rights in the Content on Upchar Health feed vests with Upchar. The User agrees not to infringe upon Upchar’s intellectual property by copying or plagiarizing content on Upchar Health feed. Upchar reserves its right to initiate all necessary legal remedies available to them in case of such an infringement by the User. All comments created and uploaded by the User on Upchar Health feed will be the sole intellectual property of Upchar. The User agrees not to post any comments on Upchar Health feed that violate the intellectual property of any other person. Upchar reserves the right to remove any comments which it may determine at its own discretion as violating the intellectual property rights of any other person. The User agrees to absolve Upchar from and indemnify Upchar against all claims that may arise as a result of any third party intellectual property right claim that may arise from the User’s uploading of any comment on Upchar Health feed.</li>
<li><i class="fas fa-check" style=" "></i>User agrees not to post any comments which are defamatory, obscene, objectionable or in nature and Upchar reserves the right to remove any comments which it may determine at its own discretion to violate these Terms and Conditions or be violative of any law or statute in force at the time. The User agrees to absolve Upchar from and indemnify Upchar against all claims that may arise as a result of any legal claim arising from the nature of the comments posted by the User on Upchar Health feed.</li>

</ul>


<h6 class="tncheading"> <i class="fas fa-quote-left"></i>  CONTENT OWNERSHIP AND COPYRIGHT CONDITIONS OF ACCESS:</h6>

<ul>
  <li><i class="fas fa-check" style=" "></i> The contents listed on the Website are (i) User generated content, or (ii) belong to Upchar. The information that is collected by Upchar directly or indirectly from the End- Users and the Practitioners shall belong to Upchar. Copying of the copyrighted content published by Upchar on the Website for any commercial purpose or for the purpose of earning profit will be a violation of copyright and Upchar reserves its rights under applicable law accordingly.</li>
<li><i class="fas fa-check" style=" "></i> Upchar authorizes the User to view and access the content available on or from the Website solely for ordering, receiving, delivering and communicating only as per this Agreement. The contents of the Website, information, text, graphics, images, logos, button icons, software code, design, and the collection, arrangement and assembly of content on the Website (collectively, "Upchar Content"), are the property of Upchar and are protected under copyright, trademark and other laws. User shall not modify the Upchar Content or reproduce, display, publicly perform, distribute, or otherwise use the Upchar Content in any way for any public or commercial purpose or for personal gain.</li>
<li><i class="fas fa-check" style=" "></i>User shall not access the Services for purposes of monitoring their availability, performance or functionality, or for any other benchmarking or competitive purposes.</li>

</ul>

<h6 class="tncheading"><b> <b/> <i class="fas fa-quote-left"></i>  REVIEWS AND FEEDBACK:</h6>

<p class="text-center">By using this Website, you agree that any information shared by you with Upchar or with any Practitioner will be subject to our Privacy Policy.
You are solely responsible for the content that you choose to submit for publication on the Website, including any feedback, ratings, or reviews (“Critical Content”) relating to Practitioners or other healthcare professionals. The role of Upchar in publishing Critical Content is restricted to that of an ‘intermediary’ under the Information Technology Act, 2000. Upchar disclaims all responsibility with respect to the content of Critical Content, and its role with respect to such content is restricted to its obligations as an ‘intermediary’ under the said Act. Upchar shall not be liable to pay any consideration to any User for re-publishing any content across any of its platforms.</p>
<p class="text-center">Your publication of reviews and feedback on the Website is governed by Clause 5 of these Terms. Without prejudice to the detailed terms stated in Clause 5, you hereby agree not to post or publish any content on the Website that (a) infringes any third-party intellectual property or publicity or privacy rights, or (b) violates any applicable law or regulation, including but not limited to the IG Rules and SPI Rules. Upchar, at its sole discretion, may choose not to publish your reviews and feedback, if so required by applicable law, and in accordance with Clause 5 of these Terms. You agree that Upchar may contact you through telephone, email, SMS, or any other electronic means of communication for the purpose of:</p>

<ul>
<li><i class=" fas fa-check"></i> Obtaining feedback in relation to Website or Upchar’s services; and/or</li>
<li><i class=" fas fa-check"></i> Obtaining feedback in relation to any Practitioners listed on the Website; and/or</li>
<li><i class=" fas fa-check"></i> Resolving any complaints, information, or queries by Practitioners regarding your Critical Content.</li>
<p class="text-center">And you agree to provide your fullest co-operation further to such communication by Upchar. Upchar’s Feedback Collection and Fraud Detection Policy, is annexed as the Schedule hereto, and remains subject always to these Terms.</p>

</ul>

<h6 class="tncheading"><b> <b/><i class="fas fa-quote-left"></i>  RECORDS:</h6>
<p>Upchar may provide End-Users with a free facility known as ‘Records’ on its mobile application ‘Upchar’. Information available in your Records is of two types:

</p>

<ul>
  <li><i class=" fas fa-check"></i>User-created: Information uploaded by you or information generated during your interaction with Upchar ecosystem, eg: appointment, medicine order placed by you.</li>
    <li><i class=" fas fa-check"></i>Practice-created: Health Records generated by your interaction with a Practitioner who uses ‘Upchar Ray’ or other Services of Upchar software.</li>

</ul>

<p>The specific terms relating to such Health Account are as below, without prejudice to the rest of these Terms and the Privacy Policy:</p>

<ul>
        <li><i class=" fas fa-check"></i> Your Records is only created after you have signed up and explicitly accepted these Terms.</li>
        <li><i class=" fas fa-check"></i>Any Practice created Health Record is provided on an as-is basis at the sole intent, risk and responsibility of the Practitioner and Upchar does not validate the said information and makes no representation in connection therewith. You should contact the relevant Practitioner in case you wish to point out any discrepancies or add, delete, or modify the Health Record in any manner.</li>
      <li><i class=" fas fa-check"></i>The Health Records are provided on an as-is basis. While we strive to maintain the highest levels of service availability, Upchar is not liable for any interruption that may be caused to your access of the Services.</li>
       <li><i class=" fas fa-check"></i>The reminder provided by the Records is only a supplementary way of reminding you to perform your activities as prescribed by your Practitioner. In the event of any medicine reminders provided by Upchar, you should refer to your prescription before taking any medicines. Upchar is not liable if for any reason reminders are not delivered to you or are delivered late or delivered incorrectly, despite its best efforts. In case you do not wish to receive the reminders, you can switch it off through the Upchar app.</li>
       <li><i class=" fas fa-check"></i>It is your responsibility to keep your correct mobile number and email ID updated in the Records. The Health Records will be sent to the Records associated with this mobile number and/or email ID. Every time you change any contact information (mobile or email), we will send a confirmation. Upchar is not responsible for any loss or inconvenience caused due to your failure in updating the contact details with Upchar.</li>
       <li><i class=" fas fa-check"></i>Upchar uses industry–level security and encryption to your Health Records. However, Upchar does not guarantee to prevent unauthorized access if you lose your login credentials or they are otherwise compromised. In the event you are aware of any unauthorized use or access, you shall immediately inform Upchar of such unauthorized use or access. Please safeguard your login credentials and report any actual suspected breach of account to support@Upchar.com.</li>
       <li><i class=" fas fa-check"></i>If you access your dependents’ Health Records by registering your dependents with your own Records, you are deemed to be responsible for the Health Records of your dependents and all obligations that your dependents would have had, had they maintained their own separate individual Records. You agree that it shall be your sole responsibility to obtain prior consent of your dependent and shall have right to share, upload and publish any sensitive personal information of your dependent. Upchar assumes no responsibility for any claim, dispute or liability arising in this regard, and you shall indemnify Upchar and its officers against any such claim or liability arising out of unauthorized use of such information.</li>
       <li><i class=" fas fa-check"></i>In case you want to delete your Records, you can do so by contacting our service support team. However only your account and any associated Health Records will be deleted, and your Health Records stored by your Practitioners will continue to be stored in their respective accounts.</li>
       <li><i class=" fas fa-check"></i>You may lose your “User created” record, if the data is not synced with the server.</li>
       <li><i class=" fas fa-check"></i>If the Health Record is unassessed for a stipulated time, you may not be able to access your Health Records due to security reasons.</li>
       <li><i class=" fas fa-check"></i>Upchar is not liable if for any reason, Health Records are not delivered to you or are delivered late despite its best efforts.</li>
       <li><i class=" fas fa-check"></i>The Health Records are shared with the phone numbers that are provided by your Practitioner. Upchar is not responsible for adding the Heath Records with incorrect numbers if those incorrect numbers are provided by the Practitioner.</li>
       <li><i class=" fas fa-check"></i>Upchar is not responsible or liable for any content, fact, Health Records, medical deduction or the language used in your Health Records whatsoever. Your Practitioner is solely responsible and liable for your Health Records and any information provided to us including but not limited to the content in them.</li>
       <li><i class=" fas fa-check"></i>Upchar has the ability in its sole discretion to retract Health Records without any prior notice if they are found to be shared incorrectly or inadvertently.</li>
       <li><i class=" fas fa-check"></i>Upchar will follow the law of land in case of any constitutional court or jurisdiction mandates to share the Health Records for any reason.</li>
       <li><i class=" fas fa-check"></i>You agree and acknowledge that Upchar may need to access the Health Record for cases such as any technical or operational issue of the End User in access or ownership of the Records.</li>
       <li><i class=" fas fa-check"></i>You acknowledge that the Practitioners you are visiting may engage Upchar's software or third party software for the purposes of the functioning of the Practitioner’s business and Upchar's services including but not limited to the usage and for storage of Records (as defined in Section 3.10) in India and outside India, in accordance with the applicable laws.</li>
       <li><i class=" fas fa-check"></i>To the extent that your Records have been shared with Upchar or stored on any of the Upchar products used by Practitioner’s you are visiting, and may in the past have visited, You hereby agree to the storage of your Records by Upchar pertaining to such previously visited clinics and hospitals who have tie ups with Upchar for the purposes of their business and for Upchar's services including but not limited to the usage and for storage of Records (as defined in Section 3.10) in India and outside India, in accordance with the applicable laws and further agree, upon creation of your account with Upchar, to the mapping of such Records as may be available in Upchar’s database to your User account.</li>
       
</ul>


<h6 class="tncheading"><b><b/><i class="fas fa-quote-left"></i>  UPCHAR MEDICINE INFORMATION:</h6>
<p>For detailed terms and conditions regarding medicine information click <a href="#"> here</a>.</p>



<h6 class="tncheading"><b> <b/><i class="fas fa-quote-left"></i>  TERMS OF USE PRACTITIONERS:</h6>
  <p>The terms in this Clause 4 are applicable only to Practitioners.</p>
<h6 class="tncheading"><b> <b/> <i class="fas fa-quote-left"></i>  LISTING POLICY:</h6>
  
<ul>
   <li><i class="fas fa-check" style=" "></i>Upchar, directly and indirectly, collects information regarding the Practitioners’ profiles, contact details, and practice. Upchar reserves the right to take down any Practitioner’s profile as well as the right to display the profile of the Practitioners, with or without notice to the concerned Practitioner. This information is collected for the purpose of facilitating interaction with the End-Users and other Users. If any information displayed on the Website in connection with you and your profile is found to be incorrect, you are required to inform Upchar immediately to enable Upchar to make the necessary amendments.</li>
    <li><i class="fas fa-check" style=" "></i> Upchar shall not be liable and responsible for the ranking of the Practitioners on external websites and search engines </li>
     <li><i class="fas fa-check" style=" "></i>Upchar shall not be responsible or liable in any manner to the Users for any losses, damage, injuries or expenses incurred by the Users as a result of any disclosures or publications made by Upchar, where the User has expressly or implicitly consented to the making of disclosures or publications by Upchar. If the User had revoked such consent under the terms of the Privacy Policy, then Upchar shall not be responsible or liable in any manner to the User for any losses, damage, injuries or expenses incurred by the User as a result of any disclosures made by Upchar prior to its actual receipt of such revocation.</li>
      <li><i class="fas fa-check" style=" "></i>Upchar reserves the right to moderate the suggestions made by the Practitioners through feedback and the right to remove any abusive or inappropriate or promotional content added on the Website. However, Upchar shall not be liable if any inactive, inaccurate, fraudulent, or non- existent profiles of Practitioners are added to the Website.</li>
       <li><i class="fas fa-check" style=" "></i>Practitioners explicitly agree that Upchar reserves the right to publish the Content provided by Practitioners to a third party including content platforms.</li>
        <li><i class="fas fa-check" style=" "></i>When you are listed on Upchar.com, End-Users may see a ‘show number’ option. When End-Users choose this option, they choose to call your number through a free telephony service provided by Upchar, and the records of such calls are recorded and stored in Upchar’s servers. Such records are dealt with only in accordance with the terms of the Privacy Policy. Such call facility provided to End-Users and to you by Upchar should be used only for appointment and booking purposes, and not for consultation on health-related issues. Upchar accepts no liability if the call facility is not used in accordance with the foregoing.</li>
         <li><i class="fas fa-check" style=" "></i> You as a Practitioner hereby represent and warrant that you will use the Services in accordance with applicable law. Any contravention of applicable law as a result of your use of these Services is your sole responsibility, and Upchar accepts no liability for the same.</li>
          
</ul>

<h6 class="tncheading"><b></b> PROFILE OWNERSHIP AND EDITING RIGHTS</h6>
<p class="text-center">Upchar ensures easy access to the Practitioners by providing a tool to update your profile information. Upchar reserves the right of ownership of all the Practitioner’s profile and photographs and to moderate the changes or updates requested by Practitioners. However, Upchar takes the independent decision whether to publish or reject the requests submitted for the respective changes or updates. You hereby represent and warrant that you are fully entitled under law to upload all content uploaded by you as part of your profile or otherwise while using Upchar’s services, and that no such content breaches any third party rights, including intellectual property rights. Upon becoming aware of a breach of the foregoing representation, Upchar may modify or delete parts of your profile information at its sole discretion with or without notice to you.</p>

<h6 class="tncheading"><b> </b> <i class="fas fa-quote-left"></i>  REVIEWS AND FEEDBACK DISPLAY RIGHTS OF UPCHAR</h6>
<ul>
  <li><i class="fas fa-check" style=" "></i> All Critical Content is content created by the Users of www.Upcharr.com (“Website”) and the clients of Upchar customers and Practitioners, including the End-Users. As a platform, Upchar does not take responsibility for Critical Content and its role with respect to Critical Content is restricted to that of an ‘intermediary’ under the Information Technology Act, 2000. The role of Upchar and other legal rights and obligations relating to the Critical Content are further detailed in Clauses 3.9 and 5 of these Terms. Upchar’s Feedback Collection and Fraud Detection Policy, is annexed as the Schedule hereto, and remains subject always to these Terms.</li>
           <li><i class="fas fa-check" style=" "></i> Upchar reserves the right to collect feedback and Critical Content for all the Practitioners, Clinics and Healthcare Providers listed on the Website.</li>
            <li><i class="fas fa-check" style=" "></i> Upchar shall have no obligation to pre-screen, review, flag, filter, modify, refuse or remove any or all Critical Content from any Service, except as required by applicable law.</li>
             <li><i class="fas fa-check" style=" "></i>You understand that by using the Services you may be exposed to Critical Content or other content that you may find offensive or objectionable. Upchar shall not be liable for any effect on Practitioner’s business due to Critical Content of a negative nature. In these respects, you may use the Service at your own risk. Upchar however, as an ‘intermediary, takes steps as required to comply with applicable law as regards the publication of Critical Content. The legal rights and obligations with respect to Critical Content and any other information sought to be published by Users are further detailed in Clauses 3.9 and 5 of these Terms.</li>
              <li><i class="fas fa-check" style=" "></i> Upchar will take down information under standards consistent with applicable law, and shall in no circumstances be liable or responsible for Critical Content, which has been created by the Users. The principles set out in relation to third party content in the terms of Service for the Website shall be applicable mutatis mutandis in relation to Critical Content posted on the Website.</li>
              <li><i class="fas fa-check" style=" "></i>If Upchar determines that you have provided inaccurate information or enabled fraudulent feedback,Upchar reserves the right to immediately suspend any of your accounts with Upchar and makes such declaration on the website alongside your name/your clinics name as determined by Upchar for the protection of its business and in the interests of Users.</li>

           
</ul>
<h6 class="tncheading"> <i class="fas fa-quote-left"></i>  RELEVANCE ALGORITHM</h6>
<p>Upchar has designed the relevance algorithm in the best interest of the End-User and may adjust the relevance algorithm from time to time to improve the quality of the results given to the patients. It is a pure merit driven, proprietary algorithm which cannot be altered for specific Practitioners. Upchar shall not be liable for any effect on the Practitioner’s business interests due to the change in the Relevance Algorithm.</p>



<h6 class="tncheading"> <i class="fas fa-quote-left"></i>   INDEPENDENT SERVICES</h6>
<p>Your use of each Service confers upon you only the rights and obligations relating to such Service, and not to any other service that may be provided by Upchar.</p>


<h6 class="tncheading"><i class="fas fa-quote-left"></i>   UPCHAR REACH RIGHTS</h6>
<p>Upchar reserves the rights to display sponsored ads on the Website. These ads would be marked as “Sponsored ads”. Without prejudice to the status of other content, Upchar will not be liable for the accuracy of information or the claims made in the Sponsored ads. Upchar does not encourage the Users to visit the Sponsored ads page or to avail any services from them. Upchar will not be liable for the services of the providers of the Sponsored ads.
You represent and warrant that you will use these Services in accordance with applicable law. Any contravention of applicable law as a result of your use of these Services is your sole responsibility, and Upchar accepts no liability for the same.</p>


<h6 class="tncheading"> <i class="fas fa-quote-left"></i>   UPCHAR HEALTH FEED</h6>
<ul>
     <li><i class="fas fa-check" style=" "></i> Upchar health feed is an online content platform available on the website, wherein Practitioners who have a Upchar profile and Users who have a health account can login and post health and wellness related content.</li>
              <li><i class="fas fa-check" style=" "></i> A Practitioner can use health feed by logging in from their profile, creating original content comprising text, audio, video, images data or any combination of the same (“as defined in Clause 3.7.2”), and uploading said Content to Upchar’s servers. The Practitioner can upload their own images or choose an image from the gallery that Upchar provides. Upchar shall post such Content to Upchar health feed at its own option and subject to these Terms and Conditions. The Content uploaded via Upchar health feed does not constitute medical advice and may not be construed as such by any person.</li>
              <li><i class="fas fa-check" style=" "></i> The Practitioner acknowledges that they are the original authors and creators of any Content or comments uploaded by them via Upchar health feed and that no Content or comment uploaded by them would constitute infringement of the intellectual property rights of any other person. Upchar reserves the right to remove any Content or comment which it may determine at its own discretion as violating the intellectual property rights of any other person. The Practitioner agrees to absolve Upchar from and indemnify Upchar against all claims that may arise as a result of any third party intellectual property right claim that may arise from the Practitioner’s uploading of any Content on Upchar health feed. The Practitioner also agrees to absolve Upchar from and indemnify Upchar against all claims that may arise as a result of any third party intellectual property claim if the Practitioner downloads an image from Upchar’s gallery and utilizes it for his/her personal or commercial gain.</li>
              <li><i class="fas fa-check" style=" "></i> The Practitioner hereby assigns to Upchar, in perpetuity and worldwide, all intellectual property rights in any Content or comment created by the Practitioner and uploaded by the Practitioner via Upchar health feed.</li>
              <li><i class="fas fa-check" style=" "></i> Upchar shall have the right to edit or remove the Content and any comments in such manner as it may deem fit at any time.</li>
              <li><i class="fas fa-check" style=" "></i> The Practitioner may also use Upchar health feed in order to view original content created by Users or other Practitioners and also create and upload comments on such Content including their own content where allowed.</li>
              <li><i class="fas fa-check" style=" "></i> Practitioner acknowledges that the content on Upchar health feed reflects the views and opinions of the authors of such content and does not necessarily reflect Upchar’s views.</li>
              <li><i class="fas fa-check" style=" "></i> Practitioner agrees not to post any comments or upload any Content which are defamatory, obscene, objectionable or in nature and Upchar reserves the right to remove any comments which it may determine at its own discretion to violate these Terms and Conditions or be violative of any law or statute in force at the time. The Practitioner agrees to absolve Upchar from and indemnify Upchar against all claims that may arise as a result of any legal claim arising from the nature of the Content or the comments posted by the Practitioner on Upchar health feed</li>
             
</ul>

<h6 class="tncheading"> <i class="fas fa-quote-left"></i>  UPCHAR MEDICINE INFORMATION</h6>
<p>For detailed terms and conditions regarding medicine information click here.</p>

<h6 class="tncheading"> <i class="fas fa-quote-left"></i>  BOOK APPOINTMENT AND CALL FACILITY</h6>
<ul>
   <li><i class="fas fa-check" style=" "></i>As a valuable partner on our platform we want to ensure that the Practitioners experience on the Upchar booking platform is beneficial to both, Practitioners and their Users.
For all terms and conditions of Book facility on Upchar profile check Book Standards .</li>
              <li><i class="fas fa-check" style=" "></i> Practitioner understands that, Upchar shall not be liable, under any event, for any comments or feedback given by any of the Users in relation to the Services provided by Practitioner. The option of publishing or modifying or moderating or masking (where required by law or norm etc.) the feedback provided by Users shall be solely at the discretion of Upchar.</li>
            
</ul>

<h6 class="tncheading"> <i class="fas fa-quote-left"></i>  RIGHTS AND OBLIGATIONS RELATING TO CONTENT</h6>

<ul>
    <li><i class="fas fa-check" style=" "></i> </li>
              <li><i class="fas fa-check" style=" "></i> As mandated by Regulation 3(2) of the IG Rules, Upchar hereby informs Users that they are not permitted to host, display, upload, modify, publish, transmit, update or share any information that:</li>
              <li><i class="fas fa-check" style=" "></i> belongs to another person and to which the User does not have any right to;</li>
              <li><i class="fas fa-check" style=" "></i> is grossly harmful, harassing, blasphemous, defamatory, obscene, pornographic, pedophilic, libelous, invasive of another's privacy, hateful, or racially, ethnically objectionable, disparaging, relating or encouraging money laundering or gambling, or otherwise unlawful in any manner whatever;</li>
              <li><i class="fas fa-check" style=" "></i> harm minors in any way;</li>
              <li><i class="fas fa-check" style=" "></i> infringes any patent, trademark, copyright or other proprietary rights;</li>
              <li><i class="fas fa-check" style=" "></i> violates any law for the time being in force;</li>
              <li><i class="fas fa-check" style=" "></i> deceives or misleads the addressee about the origin of such messages or communicates any information which is grossly offensive or menacing in nature;</li>
              <li><i class="fas fa-check" style=" "></i> impersonate another person;</li>
              <li><i class="fas fa-check" style=" "></i> contains software viruses or any other computer code, files or programs designed to interrupt, destroy or limit the functionality of any computer resource;</li>
              <li><i class="fas fa-check" style=" "></i> threatens the unity, integrity, defence, security or sovereignty of India, friendly relations with foreign states, or public order or causes incitement to the commission of any cognizable offence or prevents investigation of any offence or is insulting any other nation.</li>
<h6 class="tncheading"> <i class="fas fa-quote-left"></i>  Users are also prohibited from:</h6>

         
</ul>

<ul>
       <li><i class="fas fa-check" style=" "></i> violating or attempting to violate the integrity or security of the Website or any Upchar Content;</li>
              <li><i class="fas fa-check" style=" "></i> transmitting any information (including job posts, messages and hyperlinks) on or through the Website that is disruptive or competitive to the provision of Services by Upchar;</li>
              <li><i class="fas fa-check" style=" "></i> intentionally submitting on the Website any incomplete, false or inaccurate information;</li>
              <li><i class="fas fa-check" style=" "></i> making any unsolicited communications to other Users;</li>
              <li><i class="fas fa-check" style=" "></i> using any engine, software, tool, agent or other device or mechanism (such as spiders, robots, avatars or intelligent agents) to navigate or search the Website;</li>
              <li><i class="fas fa-check" style=" "></i> attempting to decipher, decompile, disassemble or reverse engineer any part of the Website;</li>
              <li><i class="fas fa-check" style=" "></i> copying or duplicating in any manner any of the Upchar Content or other information available from the Website;</li>
              <li><i class="fas fa-check" style=" "></i> framing or hot linking or deep linking any Upchar Content.</li>
              <li><i class="fas fa-check" style=" "></i> circumventing or disabling any digital rights management, usage rules, or other security features of the Software.</li>
              <li><i class=" fas fa-check" style=" "></i> Upchar, upon obtaining knowledge by itself or been brought to actual knowledge by an affected person in writing or through email signed with electronic signature about any such information as mentioned above, shall be entitled to disable such information that is in contravention of Clauses 5.1 and 5.2. Upchar shall also be entitled to preserve such information and associated records for at least 90 (ninety) days for production to governmental authorities for investigation purposes.</li>
              <li><i class=" fas fa-check" style=" "></i> In case of non-compliance with any applicable laws, rules or regulations, or the Agreement (including the Privacy Policy) by a User, Upchar has the right to immediately terminate the access or usage rights of the User to the Website and Services and to remove non-compliant information from the Website.</li>
              <li><i class=" fas fa-check" style=" "></i> Upchar may disclose or transfer User-generated information to its affiliates or governmental authorities in such manner as permitted or required by applicable law, and you hereby consent to such transfer. The SPI Rules only permit Upchar to transfer sensitive personal data or information including any information, to any other body corporate or a person in India, or located in any other country, that ensures the same level of data protection that is adhered to by Upchar as provided for under the SPI Rules, only if such transfer is necessary for the performance of the lawful contract between Upchar or any person on its behalf and the User or where the User has consented to data transfer.</li>
              <li><i class=" fas fa-check" style=" "></i> Upchar respects the intellectual property rights of others and we do not hold any responsibility for any violations of any intellectual property rights</li>
             

</ul>
<h6 class="tncheading"><i class="fas fa-quote-left"></i>  TERMINATION</h6>
<ul>
   <li><i class=" fas fa-check" style=" "></i> Upchar reserves the right to suspend or terminate a User’s access to the Website and the Services with or without notice and to exercise any other remedy available under law, in cases where,</li>
    <li><i class=" fas fa-check" style=" "></i> Such User breaches any terms and conditions of the Agreement;</li>
     <li><i class=" fas fa-check" style=" "></i> A third party reports violation of any of its right as a result of your use of the Services;</li>
      <li><i class=" fas fa-check" style=" "></i> Upchar is unable to verify or authenticate any information provide to Upchar by a User;</li>
       <li><i class=" fas fa-check" style=" "></i> Upchar has reasonable grounds for suspecting any illegal, fraudulent or abusive activity on part of such User; or</li>
        <li><i class=" fas fa-check" style=" "></i> Upchar believes in its sole discretion that User’s actions may cause legal liability for such User, other Users or for Upchar or are contrary to the interests of the Website.</li>
         <li><i class=" fas fa-check" style=" "></i><b> </b>Once temporarily suspended, indefinitely suspended or terminated, the User may not continue to use the Website under the same account, a different account or re-register under a new account. On termination of an account due to the reasons mentioned herein, such User shall no longer have access to data, messages, files and other material kept on the Website by such User. The User shall ensure that he/she/it has continuous backup of any medical services the User has rendered in order to comply with the User’s record keeping process and practices.</li>
        

</ul>


<h6 class="tncheading"><i class="fas fa-quote-left"></i>  LIMITATION OF LIABILITY</h6>
<p>
  In no event, including but not limited to negligence, shall Upchar, or any of its directors, officers, employees, agents or content or service providers (collectively, the “Protected Entities”) be liable for any direct, indirect, special, incidental, consequential, exemplary or punitive damages arising from, or directly or indirectly related to, the use of, or the inability to use, the Website or the content, materials and functions related thereto, the Services, User’s provision of information via the Website, lost business or lost End-Users, even if such Protected Entity has been advised of the possibility of such damages. In no event shall the Protected Entities be liable for:
</p>
<ul>
           <li><i class=" fas fa-check" style=" "></i> provision of or failure to provide all or any service by Practitioners to End- Users contacted or managed through the Website;</li>
           <li><i class=" fas fa-check" style=" "></i> any content posted, transmitted, exchanged or received by or on behalf of any User or other person on or through the Website;</li>
            <li><i class=" fas fa-check" style=" "></i> any unauthorized access to or alteration of your transmissions or data; or</li>
             <li><i class=" fas fa-check" style=" "></i> any other matter relating to the Website or the Service.</li>

             <p>In no event shall the total aggregate liability of the Protected Entities to a User for all damages, losses, and causes of action (whether in contract or tort, including, but not limited to, negligence or otherwise) arising from this Agreement or a User’s use of the Website or the Services exceed, in the aggregate Rs. 1000/- (Rupees One Thousand Only).</p>
              
</ul>

<h6 class="tncheading"><i class="fas fa-quote-left"></i>  RETENTION AND REMOVAL</h6>
<p>Upchar may retain such information collected from Users from its Website or Services for as long as necessary, depending on the type of information; purpose, means and modes of usage of such information; and according to the SPI Rules. Computer web server logs may be preserved as long as administratively necessary.
</p>

<h6 class="tncheading"> <i class="fas fa-quote-left"></i>  APPLICABLE LAW AND DISPUTE SETTLEMENT</h6>
<ul>
  <li><i class=" fas fa-check" style=" "></i> You agree that this Agreement and any contractual obligation between Upchar and User will be governed by the laws of India.</li>
  <li><i class=" fas fa-check" style=" "></i> Any dispute, claim or controversy arising out of or relating to this Agreement, including the determination of the scope or applicability of this Agreement to arbitrate, or your use of the Website or the Services or information to which it gives access, shall be determined by arbitration in India, before a sole arbitrator appointed by Upchar. Arbitration shall be conducted in accordance with the Arbitration and Conciliation Act, 1996. The seat of such arbitration shall be Bangalore. All proceedings of such arbitration, including, without limitation, any awards, shall be in the English language. The award shall be final and binding on the parties to the dispute.</li>
  <li><i class=" fas fa-check" style=" "></i> Subject to the above Clause 9.2, the courts at Bengaluru shall have exclusive jurisdiction over any disputes arising out of or in relation to this Agreement, your use of the Website or the Services or the information to which it gives access.</li>
 
</ul>

<h6 class="tncheading"><i class="fas fa-quote-left"></i>  CONTACT INFORMATION GRIEVANCE OFFICER</h6>
<ul>
   <li><i class=" fas fa-check" style=" "></i> If a User has any questions concerning Upchar, the Website, this Agreement, the Services, or anything related to any of the foregoing, Upchar customer support can be reached at the following email address: support@Upchar.com or via the contact information available from the following hyperlink: www.Upcharr.com/contact.</li>
  <li><i class=" fas fa-check" style=" "></i> In accordance with the Information Technology Act, 2000, and the rules made there under, if you have any grievance with respect to the Website or the service, including any discrepancies and grievances with respect to processing of information, you can contact our Grievance Officer at: Name: SowmyaSudarshan Designation: Head – Customer Experience Address: 4th Floor, Abhaya Heights, Bannerghatta Road, Bangalore, India- 560078 Email: support@Upchar.com Telephone: +91-8880588999 (Ask to be connected to the Grievance Officer) In the event you suffer as a result of access or usage of our Website by any person in violation of Rule 3 of the IG Rules, please address your grievance to the above person.</li>
 
</ul>

<h6 class="tncheading"><i class="fas fa-quote-left"></i>  SEVERABILITY</h6>
<ul>
   <li><i class=" fas fa-check" style=" "></i>  If any provision of the Agreement is held by a court of competent jurisdiction or arbitral tribunal to be unenforceable under applicable law, then such provision shall be excluded from this Agreement and the remainder of the Agreement shall be interpreted as if such provision were so excluded and shall be enforceable in accordance with its terms; provided however that, in such event, the Agreement shall be interpreted so as to give effect, to the greatest extent consistent with and permitted by applicable law, to the meaning and intention of the excluded provision as determined by such court of competent jurisdiction or arbitral tribunal.</li>
  

</ul>
<h4 class="tncheading"><i class="fas fa-quote-left"></i>  WAIVER</h4>
<ul>
  <li><i class=" fas fa-check" style=" "></i> No provision of this Agreement shall be deemed to be waived and no breach excused, unless such waiver or consent shall be in writing and signed by Upchar. Any consent by Upchar to, or a waiver by Upchar of any breach by you, whether expressed or implied, shall not constitute consent to, waiver of, or excuse for any other different or subsequent breach.
YOU HAVE READ THESE TERMS OF USE AND AGREE TO ALL OF THE PROVISIONS CONTAINED ABOVE
</li>
</ul>


                        </div>
                                </div>
                        </div>
                
       </div>




<!-- Footer Code-->


<?php include ('includes/footer.php'); ?>
<div class="clearfix"></div>
  



<script type="text/javascript">
  $('.carousel').carousel({
  interval: 3000
})
</script>

<script>
$(document).ready(function(){
  $(".showPartners").mouseover(function(){
    $("#showBox").css("display", "block");
    
  });

  $(".close").click(function(){
    $("#showBox").css("display", "none");
    
  });

  $(".showPartners").click(function(){
    $("#showBox").css("display", "none");
    
  });
  
});


</script>


</body>
</html>