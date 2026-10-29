<?php
session_start();
require_once 'db.php';
require_once 'auth_guard.php';
$serverError = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name=trim($_POST['name'] ?? ''); $email=trim($_POST['email'] ?? '');
    $password=$_POST['password'] ?? ''; $mobile=trim($_POST['mobile'] ?? '');
    $course=trim($_POST['course'] ?? ''); $year=trim($_POST['year'] ?? '');
    $gender=trim($_POST['gender'] ?? ''); $terms=isset($_POST['terms']);
    if ($name==='' || !filter_var($email,FILTER_VALIDATE_EMAIL) || strlen($password)<8 || !preg_match('/^[0-9]{10}$/',$mobile) || $course==='' || !in_array($year,['1','2','3','4'],true) || !in_array($gender,['Male','Female','Other'],true) || !$terms) {
        $serverError='Please complete all fields correctly. Password must be at least 8 characters and mobile must contain 10 digits.';
    } else {
        $check=$pdo->prepare('SELECT id FROM users WHERE email=?'); $check->execute([$email]);
        if ($check->fetch()) { $serverError='This email is already registered. Please log in.'; }
        else {
            try {
                $pdo->beginTransaction();
                $stmt=$pdo->prepare('INSERT INTO users (name,email,password,role) VALUES (?,?,?,?)');
                $stmt->execute([$name,$email,password_hash($password,PASSWORD_DEFAULT),'student']);
                $userId=(int)$pdo->lastInsertId();
                $stmt=$pdo->prepare('INSERT INTO students (user_id,name,mobile,course,year,gender) VALUES (?,?,?,?,?,?)');
                $stmt->execute([$userId,$name,$mobile,$course,(int)$year,$gender]);
                $log=$pdo->prepare('INSERT INTO audit_logs (user_id,action) VALUES (?,?)'); $log->execute([$userId,'Registered account']);
                $pdo->commit(); header('Location: login.php?registered=1'); exit;
            } catch (Throwable $e) { if($pdo->inTransaction()) $pdo->rollBack(); $serverError='Registration could not be completed. Please check your database schema.'; }
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>

    <title>Sign Up - Student Hub Portal</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;

            display: flex;
            justify-content: center;
            align-items: center;

            min-height: 100vh;
            padding: 20px;

            transition: 0.3s;
        }


        /* SIGNUP BOX */

        .signup-box {
            width: 100%;
            max-width: 550px;

            background: white;

            padding: 35px;

            border-radius: 10px;

            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);

            transition: 0.3s;
        }


        /* HEADING */

        h2 {
            margin-bottom: 25px;

            color: #003366;

            text-align: center;
        }


        /* FORM */

        form {
            display: grid;
            gap: 15px;
        }


        /* LABEL */

        label {
            font-weight: bold;

            display: block;

            margin-bottom: 6px;
        }


        /* INPUT AND SELECT */

        input,
        select {
            width: 100%;

            padding: 12px;

            font-size: 16px;

            border: 1px solid #ccc;

            border-radius: 5px;

            transition: 0.3s;
        }


        input:focus,
        select:focus {

            outline: none;

            border-color: #0066cc;

        }


        /* MOBILE NUMBER */

        .mobile-box {

            display: flex;

            gap: 8px;

        }


        .country-code {

            width: 70px;

            background: #e5e7eb;

            display: flex;

            justify-content: center;

            align-items: center;

            border: 1px solid #ccc;

            border-radius: 5px;

            font-weight: bold;

        }


        .mobile-box input {

            flex: 1;

        }


        /* GENDER */

        .gender-options {

            display: flex;

            gap: 25px;

            align-items: center;

        }


        .gender-options label {

            font-weight: normal;

            margin: 0;

            display: flex;

            align-items: center;

            gap: 5px;

        }


        .gender-options input {

            width: auto;

        }


        /* TERMS */

        .terms {

            display: flex;

            align-items: center;

            gap: 8px;

            font-weight: normal;

        }


        .terms input {

            width: auto;

        }


        /* ERROR MESSAGE */

        .error {

            color: red;

            font-size: 14px;

            margin-top: 5px;

        }


        /* REGISTER BUTTON */

        button {

            width: 100%;

            padding: 12px;

            background: green;

            color: white;

            border: none;

            border-radius: 5px;

            font-size: 16px;

            cursor: pointer;

        }


        button:hover {

            background: darkgreen;

        }


        /* LINKS */

        a {

            text-decoration: none;

            color: blue;

        }


        a:hover {

            color: red;

        }


        .bottom-links {

            text-align: center;

            margin-top: 20px;

        }


        /* ================= DARK MODE ================= */

        .dark {

            background: #121212;

            color: white;

        }


        .dark .signup-box {

            background: #1f2937;

            color: white;

        }


        .dark h2 {

            color: #93c5fd;

        }


        .dark input,
        .dark select {

            background: #374151;

            color: white;

            border: 1px solid #555;

        }


        .dark input::placeholder {

            color: #ddd;

        }


        .dark a {

            color: #93c5fd;

        }


        .dark button {

            background: #15803d;

        }


        .dark button:hover {

            background: #166534;

        }


        .dark .country-code {

            background: #4b5563;

            color: white;

            border-color: #555;

        }


        /* ================= TABLET / DESKTOP ================= */

        @media (min-width:768px) {

            .signup-box {

                max-width: 550px;

                padding: 40px;

            }


            h2 {

                font-size: 30px;

            }

        }
    </style>

</head>


<body>


    <div class="signup-box">


        <h2>Create Your Account</h2>
<?php if ($serverError !== ''): ?><p class="error" style="color:#b91c1c;text-align:center"><?= h($serverError) ?></p><?php endif; ?>


        <form id="signupForm" action="signup.php" method="post">


            <!-- ================= NAME ================= -->

            <div>

                <label for="name">Name</label>

                <input type="text" id="name" name="name" placeholder="Enter your full name">

                <p id="nameError" class="error"></p>

            </div>


            <!-- ================= EMAIL ================= -->

            <div>

                <label for="email">Email</label>

                <input type="email" id="email" name="email" placeholder="Enter your email">

                <p id="emailError" class="error"></p>

            </div>


            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Create a password (minimum 8 characters)" required minlength="8" autocomplete="new-password">
                <p id="passwordError" class="error"></p>
            </div>


            <!-- ================= MOBILE ================= -->

            <div>

                <label for="mobile">Mobile Number</label>


                <div class="mobile-box">


                    <div class="country-code">

                        +91

                    </div>


                    <input type="text" id="mobile" name="mobile" placeholder="Enter 10 digit mobile number"
                        maxlength="10">


                </div>


                <p id="mobileError" class="error"></p>

            </div>


            <!-- ================= COURSE ================= -->

            <div>

                <label for="course">Course</label>


                <select id="course" name="course">

                    <option value="">
                        -- Select Course --
                    </option>

                    <option value="IT">
                        IT
                    </option>

                    <option value="CSE">
                        CSE
                    </option>

                    <option value="CE">
                        CE
                    </option>

                    <option value="AIML">
                        AIML
                    </option>

                    <option value="Civil">
                        Civil
                    </option>

                    <option value="Mechanical">
                        Mechanical
                    </option>

                    <option value="EC">
                        EC
                    </option>

                    <option value="Electrical">
                        Electrical
                    </option>

                </select>


                <p id="courseError" class="error"></p>

            </div>


            <!-- ================= YEAR ================= -->

            <div>

                <label for="year">Year</label>


                <select id="year" name="year">

                    <option value="">
                        -- Select Year --
                    </option>

                    <option value="1">
                        1st Year
                    </option>

                    <option value="2">
                        2nd Year
                    </option>

                    <option value="3">
                        3rd Year
                    </option>

                    <option value="4">
                        4th Year
                    </option>

                </select>


                <p id="yearError" class="error"></p>

            </div>


            <!-- ================= GENDER ================= -->

            <div>

                <label>Gender</label>


                <div class="gender-options">


                    <label>

                        <input type="radio" name="gender" value="Male">

                        Male

                    </label>


                    <label>

                        <input type="radio" name="gender" value="Female">

                        Female

                    </label>


                    <label>

                        <input type="radio" name="gender" value="Other">

                        Other

                    </label>


                </div>


                <p id="genderError" class="error"></p>

            </div>


            <!-- ================= TERMS ================= -->

            <div>


                <label class="terms">


                    <input type="checkbox" id="terms" name="terms">


                    I agree to the Terms and Conditions


                </label>


                <p id="termsError" class="error"></p>

            </div>


            <!-- ================= REGISTER ================= -->

            <button type="submit">

                Register

            </button>


        </form>


        <!-- ================= LINKS ================= -->

        <div class="bottom-links">


            <p>

                Already have an account?

                <a href="login.php">
                    Login
                </a>

            </p>


            <br>


            <p>

                <a href="home.php">
                    ← Back to Home
                </a>

            </p>


        </div>


    </div>
    <script>


        /* =====================================================
           DARK MODE
        ===================================================== */


        function applyTheme() {

            let theme = localStorage.getItem("theme");


            console.log("Current theme:", theme);


            if (theme === "dark") {

                document.body.classList.add("dark");

            }
            else {

                document.body.classList.remove("dark");

            }

        }


        /* Apply theme when page loads */

        document.addEventListener("DOMContentLoaded", function () {

            applyTheme();

        });


        /* Detect theme changes from another page/tab */

        window.addEventListener("storage", function (event) {

            if (event.key === "theme") {

                applyTheme();

            }

        });



        /* =====================================================
           FORM VALIDATION
        ===================================================== */


        const form = document.getElementById("signupForm");


        form.addEventListener("submit", function (event) {


            /* Prevent form from submitting immediately */

            event.preventDefault();



            /* =================================================
               GET VALUES
            ================================================= */


            let name = document
                .getElementById("name")
                .value
                .trim();


            let email = document
                .getElementById("email")
                .value
                .trim();


            let mobile = document
                .getElementById("mobile")
                .value
                .trim();


            let course = document
                .getElementById("course")
                .value;


            let year = document
                .getElementById("year")
                .value;


            let gender = document.querySelector(
                'input[name="gender"]:checked'
            );


            let terms = document
                .getElementById("terms")
                .checked;



            /* =================================================
               VALID VARIABLE
            ================================================= */


            let valid = true;



            /* =================================================
               CLEAR PREVIOUS ERRORS
            ================================================= */


            document.getElementById("nameError").textContent = "";

            document.getElementById("emailError").textContent = "";

            document.getElementById("mobileError").textContent = "";

            document.getElementById("courseError").textContent = "";

            document.getElementById("yearError").textContent = "";

            document.getElementById("genderError").textContent = "";

            document.getElementById("termsError").textContent = "";



            /* =================================================
               NAME VALIDATION
            ================================================= */


            if (name === "") {

                document.getElementById("nameError").textContent =
                    "This field is required.";

                valid = false;

            }

            else if (!/^[A-Za-z ]+$/.test(name)) {

                document.getElementById("nameError").textContent =
                    "Invalid input: Name should contain only letters and spaces.";

                valid = false;

            }



            /* =================================================
               EMAIL VALIDATION
            ================================================= */


            if (email === "") {

                document.getElementById("emailError").textContent =
                    "This field is required.";

                valid = false;

            }

            else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {

                document.getElementById("emailError").textContent =
                    "Invalid input: Please enter a valid email address.";

                valid = false;

            }



            /* =================================================
               MOBILE VALIDATION
            ================================================= */


            if (mobile === "") {

                document.getElementById("mobileError").textContent =
                    "This field is required.";

                valid = false;

            }

            else if (!/^[0-9]+$/.test(mobile)) {

                document.getElementById("mobileError").textContent =
                    "Invalid input: Mobile number should contain only digits.";

                valid = false;

            }

            else if (mobile.length !== 10) {

                document.getElementById("mobileError").textContent =
                    "Invalid input: Mobile number must contain exactly 10 digits.";

                valid = false;

            }



            /* =================================================
               COURSE VALIDATION
            ================================================= */


            if (course === "") {

                document.getElementById("courseError").textContent =
                    "Please select a course.";

                valid = false;

            }



            /* =================================================
               YEAR VALIDATION
            ================================================= */


            if (year === "") {

                document.getElementById("yearError").textContent =
                    "Please select your year.";

                valid = false;

            }



            /* =================================================
               GENDER VALIDATION
            ================================================= */


            if (!gender) {

                document.getElementById("genderError").textContent =
                    "Please select your gender.";

                valid = false;

            }



            /* =================================================
               TERMS VALIDATION
            ================================================= */


            if (!terms) {

                document.getElementById("termsError").textContent =
                    "Please accept the Terms and Conditions.";

                valid = false;

            }



            /* =================================================
               FINAL CHECK
            ================================================= */


            if (valid) {

                alert("Registration successful!");


                /*
                    Submit the form only when
                    every field is valid.
                */

                form.submit();

            }


        });


    </script>


</body>

</html>