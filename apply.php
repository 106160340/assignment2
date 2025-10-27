<!DOCTYPE html>
<html lang="en">

<!-- Header include -->
<?php include 'header.inc'; ?>

<!-- navigation include -->
<?php include 'nav.inc'; ?>


<body>

    <!-- Image -->
    <img src="images/university_1.jpg" alt="view of university campus. A tree in front of a building."
        title="State University" class="theme_image">
    <!-- main heading of the page -->
    <h1>Apply Now</h1>
    <article>
        <section aria-labelledby="form_instruction">
            <!-- Please update this heading to your page accordingly (this is the first line after your navigation bar)-->
            <h2 id="form_heading">Please Fill In The Application Form</h2>
            <!-- Update, add or remove paragraphs and headings as needed -->
            <p>Required fields are marked with an asterisk (<span class="asterisk">&ast;</span>).</p>
            <p id="form_instruction">Please ensure that all information provided is accurate and complete to the best of
                your knowledge
            </p>
        </section>
        <!-- Forms -->
        <section id="application_form" aria-labelledby="form_heading">
            <form method="post" action="process_eoi.php">
                <!-- Job details -->
                <div id="job_details" class="form_section">
                    <h2>Job Details</h2>
                    <!-- Specify restriction on the input-->
                    <p class="prompt">Please fill in the Job Reference Number exactly as it appears in the <a
                            class="inline_link" href="jobs.html">job listing</a>.
                        Accepting 5-character alfanumeric input only.</p>
                    <p class="prompt">For example: ab123</p>
                    <p><label for="job_ref">Job Reference Number<span class="asterisk">&ast;</span></label>
                        <input type="text" id="job_ref" name="job_ref" pattern="[A-Za-z0-9]{5}" placeholder="e.g. ab123"
                            required />
                    </p>

                </div>
                <div id="personal_info" class="form_section">
                    <h2>Personal Information</h2>
                    <p class="prompt">Maximum 20 characters in each field.</p>
                    <p><label for="first_name">First Name<span class="asterisk">&ast;</span></label>
                        <input type="text" id="first_name" name="first_name" pattern="[A-Za-z]+{,20}"
                            placeholder="e.g. John" />
                    </p>
                    <p>
                        <label for="last_name">Last Name<span class="asterisk">&ast;</span></label>
                        <input type="text" id="last_name" name="last_name" pattern="[A-Za-z]{,20}"
                            placeholder="e.g. Smith" />
                    </p>
                    <p class="prompt">
                        Please enter your date of birth in the format dd/MM/yyyy.
                    </p>
                    <p><label for="dob">Date of Birth<span class="asterisk">&ast;</span></label>
                        <input type="date" id="dob" name="date_of_birth" format="dd/MM/yyyy" required />
                    </p>
                    <!-- Gender selection - radio type -->
                    <fieldset id="gender" class="form_section">
                        <legend>Gender<span class="asterisk">&ast;</span></legend>
                        <p>
                            <input type="radio" id="male" name="gender" value="male" required="required" />
                            <label for="male">Male</label>
                            <input type="radio" id="female" name="gender" value="female" />
                            <label for="female">Female</label>
                            <input type="radio" id="other" name="gender" value="other" />
                            <label for="other">Other</label>
                        </p>
                    </fieldset>
                </div>
                <!-- Address details -->
                <div id="address" class="form_section">
                    <h2>Address</h2>
                    <p><label for="street">Street Address<span class="asterisk">&ast;</span></label>
                        <input type="text" id="street" name="street" placeholder="e.g. 123 Main St" pattern=".{1,40}"
                            required />
                    </p>
                    <p><label for="suburb">Suburb/Town<span class="asterisk">&ast;</span></label>
                        <input type="text" id="suburb" name="suburb" placeholder="e.g. Melbourne" pattern=".{1,40}"
                            required />
                    </p>
                    <p><label for="state">State<span class="asterisk">&ast;</span></label>
                        <select id="state" name="state" required>
                            <option value="VIC">VIC</option>
                            <option value="NSW">NSW</option>
                            <option value="QLD">QLD</option>
                            <option value="TAS">TAS</option>
                            <option value="ACT">ACT</option>
                            <option value="NT">NT</option>
                            <option value="WA">WA</option>
                            <option value="SA">SA</option>
                        </select>
                    </p>
                    <p><label for="postcode">Postcode<span class="asterisk">&ast;</span></label>
                        <input type="text" id="postcode" name="postcode" pattern="\d{4}" placeholder="e.g. 3000"
                            required />
                    </p>

                </div>
                <!-- Contact details -->
                <div id="contact_info" class="form_section">
                    <h2>Contact Information</h2>
                    <p><label for="email">Email<span class="asterisk">&ast;</span></label>
                        <input type="text" id="email" name="email" placeholder="e.g. john.smith@example.com"
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required />
                    </p>
                    <p class="prompt">Please enter an 8 to 12-digit phone number.</p>
                    <p><label for="phone">Phone Number<span class="asterisk">&ast;</span></label>
                        <input type="tel" id="phone" name="phone" pattern="\d{8,12}" placeholder="e.g. 0412345678"
                            required />
                    </p>
                </div>
                <!-- Skills - checkbox type -->
                <div id="skills" class="form_section">
                    <h2>Skills</h2>
                    <p class="prompt">Please select at least one, and select all that apply.<span
                            class="asterisk">&ast;</span></p>
                    <p>
                    <fieldset>
                        <legend>Relevant Skills<span class="asterisk">&ast;</span></legend>
                        <input type="checkbox" id="computer" name="skills[]" value="basic_computer_literacy"
                            checked="checked" />
                        <label for="computer">Basic Computer Literacy</label>
                        </p>
                        <p>
                            <input type="checkbox" id="pm" name="skills[]" value="project_management" />
                            <label for="pm">Project Management</label>
                        </p>
                        <p>
                            <input type="checkbox" id="first_aid" name="skills[]" value="first_aid" />
                            <label for="first_aid">First Aid</label>
                        </p>
                        <p>
                            <input type="checkbox" id="programming" name="skills[]" value="programming" />
                            <label for="programming">Programming</label>
                        </p>
                        <p>
                            <input type="checkbox" id="data_analysis" name="skills[]" value="data_analysis" />
                            <label for="data_analysis">Data Analysis</label>
                        </p>
                        <p>
                            <input type="checkbox" id="research" name="skills[]" value="research" />
                            <label for="research">Research</label>
                        </p>
                        <p>
                            <input type="checkbox" id="writing" name="skills[]" value="technical_writing" />
                            <label for="writing">Technical Writing</label>
                        </p>
                        <p>
                            <input type="checkbox" id="teaching" name="skills[]" value="teaching" />
                            <label for="teaching">Teaching</label>
                        </p>
                        <p>
                            <input type="checkbox" id="electrical" name="skills[]" value="electrical" />
                            <label for="electrical">Electrical Wiring</label>
                        </p>
                        <p>
                            <input type="checkbox" id="modelling" name="skills[]" value="modelling" />
                            <label for="modelling">Modelling</label>
                        </p>
                        <p>
                            <input type="checkbox" id="soldering" name="skills[]" value="soldering" />
                            <label for="soldering">Soldering</label>
                        </p>
                        <p>
                            <input type="checkbox" id="other_skill" name="skills[]" value="other_skill" />
                            <label for="other_skill">Other skills...</label>
                            <input type="text" id="other_skill_text" name="other_skill_text" pattern=".{1,100}"
                                placeholder="Max. 100 characters." required />
                            <label for="other_skill_text">Please specify</label>
                        </p>
                    </fieldset>
                </div>
                <input class="button" id="submit" type="submit" value="Submit Application Form" />
                <input class="button" id="reset" type="reset" value="Reset Form" />
            </form>
        </section>
    </article>
    <!-- footer -->
    <?php include 'footer.inc' ?>
</body>

</html>