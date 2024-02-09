function signInAdmin() {
    var username = document.getElementById("username");
    var password = document.getElementById("password");
    var rememberme = document.getElementById("rememberme");

    // alert(username.value);
    // alert(password.value);
    // alert(rememberme.checked);

    var form = new FormData();
    form.append("username", username.value);
    form.append("password", password.value);
    form.append("rememberme", rememberme.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            // alert(t);

            if (t == "success") {
                window.location = "home.php";
            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "../Admin/signinProcess.php", true);
    r.send(form);
}


function signInAcademicOfficer() {
    var username1 = document.getElementById("username1");
    var password1 = document.getElementById("password1");
    var rememberme1 = document.getElementById("rememberme1");

    // alert(username.value);
    // alert(password.value);
    // alert(rememberme.checked);

    var form = new FormData();
    form.append("username1", username1.value);
    form.append("password1", password1.value);
    form.append("rememberme1", rememberme1.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            // alert(t);

            if (t == "success") {
                window.location = "home.php";
            } else if (t == "redirect") {
                window.location = "verification.php";
            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "../AcademicOfficer/signinProcess.php", true);
    r.send(form);
}

function verfication() {
    var code = document.getElementById("verification");

    var form = new FormData();
    form.append("code", code.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "verifySuccess") {
                window.location = "home.php";
            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "veryfyProcess.php", true);
    r.send(form);

}

function signInTeacher() {
    var username2 = document.getElementById("username2");
    var password2 = document.getElementById("password2");
    var rememberme2 = document.getElementById("rememberme2");

    // alert(username.value);
    // alert(password.value);
    // alert(rememberme.checked);

    var form = new FormData();
    form.append("username2", username2.value);
    form.append("password2", password2.value);
    form.append("rememberme2", rememberme2.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            // alert(t);

            if (t == "success") {
                window.location = "home.php";
            } else if (t == "redirect") {
                window.location = "verification.php";
            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "../Teacher/signinProcess.php", true);
    r.send(form);
}

function teacherVerfication() {
    var code = document.getElementById("verification");

    var form = new FormData();
    form.append("code", code.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "verifySuccess") {
                window.location = "home.php";
            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "veryfyProcess.php", true);
    r.send(form);

}

function signInStudent() {
    var username3 = document.getElementById("username3");
    var password3 = document.getElementById("password3");
    var rememberme3 = document.getElementById("rememberme3");

    // alert(username.value);
    // alert(password.value);
    // alert(rememberme.checked);

    var form = new FormData();
    form.append("username3", username3.value);
    form.append("password3", password3.value);
    form.append("rememberme3", rememberme3.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            // alert(t);


            if (t == "success") {
                window.location = "home.php";
            } else if (t == "redirect") {
                window.location = "verification.php";
            } else if (t == "payment") {
                window.location = "portalPayment.php";
            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "../Student/signinProcess.php", true);
    r.send(form);
}

function studentVerfication() {
    var code = document.getElementById("verification");

    var form = new FormData();
    form.append("code", code.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "verifySuccess") {
                window.location = "home.php";
            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "veryfyProcess.php", true);
    r.send(form);

}

function sendStudentInvitation(id) {

    var stid = id;

    var f = new FormData();
    f.append("id", stid);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "Success") {
                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Invitation Send Successfully!");

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "sendStudentInvitation.php", true);
    r.send(f);

}

function adminSignOut() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "index.php";
            }
        }
    }

    r.open("GET", "logOut.php", true);
    r.send();
}

function academicSignOut() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "index.php";
            }
        }
    }

    r.open("GET", "logOut.php", true);
    r.send();
}

function teacherSignOut() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "index.php";
            }
        }
    }

    r.open("GET", "logOut.php", true);
    r.send();
}

function studentSignOut() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "index.php";
            }
        }
    }

    r.open("GET", "logOut.php", true);
    r.send()
}

function addAdmin() {

    var ad_fname = document.getElementById("ad-fname");
    var ad_lname = document.getElementById("ad-lname");
    var ad_mobile = document.getElementById("ad-mobile");
    var ad_username = document.getElementById("ad-username");
    var ad_password = document.getElementById("ad-password");
    var ad_confirm = document.getElementById("ad-confirm");

    // alert(ad_fname.value);
    // alert(ad_lname.value);
    // alert(ad_mobile.value);
    // alert(ad_username.value);
    // alert(ad_password.value);
    // alert(ad_confirm.value);

    var f = new FormData();

    f.append("fname", ad_fname.value);
    f.append("lname", ad_lname.value);
    f.append("mobile", ad_mobile.value);
    f.append("username", ad_username.value);
    f.append("password", ad_password.value);
    f.append("confirm", ad_confirm.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Admin Added Successfully.");

                window.location.reload();

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "addAdminProcess.php", true);
    r.send(f);

}

function changeStatus(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Status Cheanged Successfully.");

                window.location.reload();

            } else {

                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);

            }

        }
    }

    r.open("GET", "adminStatusChangeProcess.php?id=" + id, true);
    r.send();

}

function updateAdmin(id) {
    var up_ad_fname = document.getElementById("ad-fname");
    var up_ad_lname = document.getElementById("ad-lname");
    var up_ad_mobile = document.getElementById("ad-mobile");
    var up_ad_username = document.getElementById("ad-username");
    var up_ad_password = document.getElementById("ad-password");
    var up_ad_confirm = document.getElementById("ad-confirm");
    var adminID = id;

    // alert(up_ad_fname.value);
    // alert(up_ad_lname.value);
    // alert(up_ad_mobile.value);
    // alert(up_ad_username.value);
    // alert(up_ad_password.value);
    // alert(up_ad_confirm.value);

    var f = new FormData();

    f.append("fname", up_ad_fname.value);
    f.append("lname", up_ad_lname.value);
    f.append("mobile", up_ad_mobile.value);
    f.append("username", up_ad_username.value);
    f.append("password", up_ad_password.value);
    f.append("confirm", up_ad_confirm.value);
    f.append("id", adminID);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            // alert(t);

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Admin Updated Successfully.");

                window.location = "manageAdmin.php";

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "updateAdminProcess.php", true);
    r.send(f);
}

function addAcademicOfficer() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var username = document.getElementById("username");
    var password = document.getElementById("password");
    var confirm = document.getElementById("confirm");
    var grade = document.getElementById("grade");

    // alert(fname.value);
    // alert(lname.value);
    // alert(email.value);
    // alert(mobile.value);
    // alert(username.value);
    // alert(password.value);
    // alert(confirm.value);

    var f = new FormData();

    f.append("fname", fname.value);
    f.append("lname", lname.value);
    f.append("mobile", mobile.value);
    f.append("email", email.value);
    f.append("username", username.value);
    f.append("password", password.value);
    f.append("confirm", confirm.value);
    f.append("grade", grade.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            // alert(t);

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Academic Officer Added Successfully...!");

                window.location.reload();

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "addAcademicOfficerProcess.php", true);
    r.send(f);

}

function changeAcademicStatus(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Status Cheanged Successfully.");

                window.location.reload();

            } else {

                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);

            }

        }
    }

    r.open("GET", "academicOfficerStatusChangeProcess.php?id=" + id, true);
    r.send();

}

function updateAcademicOfficer(id) {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var username = document.getElementById("username");
    var password = document.getElementById("password");
    var confirm = document.getElementById("confirm");
    var grade = document.getElementById("grade");
    var acID = id;

    // alert(acID);
    // alert(fname.value);
    // alert(lname.value);
    // alert(email.value);
    // alert(mobile.value);
    // alert(username.value);
    // alert(password.value);
    // alert(confirm.value);

    var f = new FormData();

    f.append("id", acID);
    f.append("fname", fname.value);
    f.append("lname", lname.value);
    f.append("mobile", mobile.value);
    f.append("email", email.value);
    f.append("username", username.value);
    f.append("password", password.value);
    f.append("confirm", confirm.value);
    f.append("grade", grade.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Academic Officer Updated Successfully...!");

                window.location = "manageAcademicOfficers.php";

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "updateAcademicOfficerProcess.php", true);
    r.send(f);

}

function sendAcademicInvitation(id) {
    var acid = id;
    var type = "academic_officer";
    var site = "AcademicOfficer";

    var f = new FormData();

    f.append("id", acid);
    f.append("type", type);
    f.append("site", site);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "Success") {
                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Invitation Send Successfully!");

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "sendInvitationProcess.php", true);
    r.send(f);
}

function addTeacher() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");
    var username = document.getElementById("username");
    var password = document.getElementById("password");
    var confirm = document.getElementById("confirm");

    // alert(fname.value);
    // alert(lname.value);
    // alert(email.value);
    // alert(mobile.value);
    // alert(gender.value);
    // alert(username.value);
    // alert(password.value);
    // alert(confirm.value);

    var f = new FormData();

    f.append("fname", fname.value);
    f.append("lname", lname.value);
    f.append("mobile", mobile.value);
    f.append("gender", gender.value);
    f.append("email", email.value);
    f.append("username", username.value);
    f.append("password", password.value);
    f.append("confirm", confirm.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Teacher Added Successfully...!");

                window.location.reload();

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "addTeacherProcess.php", true);
    r.send(f);
}

function changeTeacherStatus(id) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Status Cheanged Successfully.");

                window.location.reload();

            } else {

                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);

            }

        }
    }

    r.open("GET", "teacherStatusChangeProcess.php?id=" + id, true);
    r.send();
}

function updateTeacher(id) {
    var id = id
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");
    var username = document.getElementById("username");
    var password = document.getElementById("password");
    var confirm = document.getElementById("confirm");

    // alert(id);
    // alert(fname.value);
    // alert(lname.value);
    // alert(email.value);
    // alert(mobile.value);
    // alert(gender.value);
    // alert(username.value);
    // alert(password.value);
    // alert(confirm.value);

    var f = new FormData();

    f.append("id", id);
    f.append("fname", fname.value);
    f.append("lname", lname.value);
    f.append("mobile", mobile.value);
    f.append("gender", gender.value);
    f.append("email", email.value);
    f.append("username", username.value);
    f.append("password", password.value);
    f.append("confirm", confirm.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Teacher Updated Successfully...!");

                window.location = "manageTeachers.php";

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "updateTeacherProcess.php", true);
    r.send(f);

}

function sendTeacherInvitation(id) {
    var id = id;
    var type = "teacher";
    var site = "Teacher";

    var f = new FormData();

    f.append("id", id);
    f.append("type", type);
    f.append("site", site);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "Success") {
                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Invitation Send Successfully!");

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "sendInvitationProcess.php", true);
    r.send(f);
}

function changeStudentStatus(id) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Status Cheanged Successfully.");

                window.location.reload();

            } else {

                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);

            }

        }
    }

    r.open("GET", "studentStatusChangeProcess.php?id=" + id, true);
    r.send();
}

function addSubject() {
    var subname = document.getElementById("subname");

    var f = new FormData();

    f.append("subname", subname.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Subject Added Successfully...!");

                window.location.reload();

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "addSubjectProcess.php", true);
    r.send(f);
}

function updateSubject(id) {
    var subname = document.getElementById("subname");

    var f = new FormData();

    f.append("subname", subname.value);
    f.append("id", id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Subject Updated Successfully...!");

                window.location = "manageSubjects.php";

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "updateSubjectProcess.php", true);
    r.send(f);
}

function addTeacherHasSubject() {
    var teacher = document.getElementById("teacher");
    var subject = document.getElementById("subject");
    var grade = document.getElementById("grade");

    var f = new FormData();

    f.append("teacher", teacher.value);
    f.append("subject", subject.value);
    f.append("grade", grade.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Teacher Has Subject Added Successfully...!");

                window.location.reload();

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "addTeacherHasSubjectProcess.php", true);
    r.send(f);
}

function changeTeacherHasSubjectStatus(id) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Status Cheanged Successfully.");

                window.location.reload();

            } else {

                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);

            }

        }
    }

    r.open("GET", "teacherHasSubjectStatusChangeProcess.php?id=" + id, true);
    r.send();
}

function updateAcademicOfficerProfile(id) {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var password = document.getElementById("password");
    var confirm = document.getElementById("confirm");
    var acID = id;

    // alert(acID);
    // alert(fname.value);
    // alert(lname.value);
    // alert(email.value);
    // alert(mobile.value);
    // alert(password.value);
    // alert(confirm.value);

    var f = new FormData();

    f.append("id", acID);
    f.append("fname", fname.value);
    f.append("lname", lname.value);
    f.append("mobile", mobile.value);
    f.append("email", email.value);
    f.append("password", password.value);
    f.append("confirm", confirm.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            // alert(t);

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Profile Updated Successfully...!");

                window.location.reload();

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "updateAcademicOfficerProfileProcess.php", true);
    r.send(f);

}

function addStudent() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");
    var grade = document.getElementById("grade");
    var username = document.getElementById("username");
    var password = document.getElementById("password");
    var confirm = document.getElementById("confirm");

    // alert(fname.value);
    // alert(lname.value);
    // alert(email.value);
    // alert(mobile.value);
    // alert(gender.value);
    // alert(grade.value);
    // alert(username.value);
    // alert(password.value);
    // alert(confirm.value);

    var f = new FormData();

    f.append("fname", fname.value);
    f.append("lname", lname.value);
    f.append("mobile", mobile.value);
    f.append("gender", gender.value);
    f.append("email", email.value);
    f.append("grade", grade.value);
    f.append("username", username.value);
    f.append("password", password.value);
    f.append("confirm", confirm.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Student Added Successfully...!");

                window.location.reload();

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "addStudentProcess.php", true);
    r.send(f);
}

function changeStudentStatus(id) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Status Cheanged Successfully.");

                window.location.reload();

            } else {

                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);

            }

        }
    }

    r.open("GET", "studentStatusChangeProcess.php?id=" + id, true);
    r.send();
}

function updateStudent() {
    var id = document.getElementById("id");
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");
    var grade = document.getElementById("grade");
    var username = document.getElementById("username");
    var password = document.getElementById("password");
    var confirm = document.getElementById("confirm");

    var f = new FormData();

    f.append("id", id.value);
    f.append("fname", fname.value);
    f.append("lname", lname.value);
    f.append("mobile", mobile.value);
    f.append("gender", gender.value);
    f.append("email", email.value);
    f.append("grade", grade.value);
    f.append("username", username.value);
    f.append("password", password.value);
    f.append("confirm", confirm.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Student Added Successfully...!");

                window.location = "manageStudents.php";

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "UpdateStudentProcess.php", true);
    r.send(f);
}

function updateTeacherProfile(id) {
    var id = id
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var password = document.getElementById("password");
    var confirm = document.getElementById("confirm");

    var f = new FormData();

    f.append("id", id);
    f.append("fname", fname.value);
    f.append("lname", lname.value);
    f.append("mobile", mobile.value);
    f.append("gender", gender.value);
    f.append("email", email.value);
    f.append("username", username.value);
    f.append("password", password.value);
    f.append("confirm", confirm.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Profile Updated Successfully...!");

                window.location.reload();

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "updateTeacherProfileProcess.php", true);
    r.send(f);
}

function studentDetail(grade) {

    var f = new FormData();

    f.append("grade", grade);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            document.getElementById("tbl_tr").innerHTML = t;

        }
    }

    r.open("POST", "getStudentDetail.php", true);
    r.send(f);

}

function gradeDetails(grade) {

    var f = new FormData();

    f.append("grade", grade);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            document.getElementById("subject").innerHTML = t;

        }
    }

    r.open("POST", "getSubject.php", true);
    r.send(f);

}

function addAssignment() {
    var grade = document.getElementById("grade");
    var subject = document.getElementById("subject");
    var name = document.getElementById("name");
    var file = document.getElementById("upload");

    var f = new FormData();

    f.append("grade", grade.value);
    f.append("subject", subject.value);
    f.append("name", name.value);
    f.append("file", file.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Assignment Uploaded Successfully...!");

                window.location.reload();

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }

        }
    }

    r.open("POST", "addAssignmentProcess.php", true);
    r.send(f);
}

function updateAssignment() {
    var id = document.getElementById("id");
    var name = document.getElementById("name");
    var file = document.getElementById("upload");

    var f = new FormData();

    f.append("id", id.value);
    f.append("name", name.value);
    f.append("file", file.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Assignment Uploaded Successfully...!");

                window.location = "manageAssignments.php";

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }

        }
    }

    r.open("POST", "updateAssignmentProcess.php", true);
    r.send(f);
}

function addNote() {
    var grade = document.getElementById("grade");
    var subject = document.getElementById("subject");
    var name = document.getElementById("name");
    var file = document.getElementById("upload");

    var f = new FormData();

    f.append("grade", grade.value);
    f.append("subject", subject.value);
    f.append("name", name.value);
    f.append("file", file.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Note Uploaded Successfully...!");

                window.location.reload();

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }

        }
    }

    r.open("POST", "addNoteProcess.php", true);
    r.send(f);
}

function updateNote() {
    var id = document.getElementById("id");
    var name = document.getElementById("name");
    var file = document.getElementById("upload");

    var f = new FormData();

    f.append("id", id.value);
    f.append("name", name.value);
    f.append("file", file.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Note Updated Successfully...!");

                window.location = "manageNotes.php";

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }

        }
    }

    r.open("POST", "updateNoteProcess.php", true);
    r.send(f);
}

function adminStudentDetail(grade) {
    var f = new FormData();

    f.append("grade", grade);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("adminStudents").innerHTML = t;

        }
    }

    r.open("POST", "getStudentDetail.php", true);
    r.send(f);

}

function releaseAssignment(id) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Status Cheanged Successfully.");

                window.location.reload();

            } else {

                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);

            }

        }
    }

    r.open("GET", "releaseAssignmentProcess.php?id=" + id, true);
    r.send();
}

function releaseNote(id) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Status Cheanged Successfully.");

                window.location.reload();

            } else {

                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);

            }

        }
    }

    r.open("GET", "releaseNoteProcess.php?id=" + id, true);
    r.send();
}

function updateStudentProfile(id) {
    var id = id
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var password = document.getElementById("password");
    var confirm = document.getElementById("confirm");

    var f = new FormData();

    f.append("id", id);
    f.append("fname", fname.value);
    f.append("lname", lname.value);
    f.append("mobile", mobile.value);
    f.append("gender", gender.value);
    f.append("email", email.value);
    f.append("username", username.value);
    f.append("password", password.value);
    f.append("confirm", confirm.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Profile Updated Successfully...!");

                window.location.reload();

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "updateStudentProfileProcess.php", true);
    r.send(f);
}

function uploadAnswer(id) {

    var file = document.getElementById("upload");

    var f = new FormData();

    f.append("assignment", id);
    f.append("file", file.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Answer Uploaded Successfully...!");

                window.location.reload();

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }

        }
    }

    r.open("POST", "addAnswerProcess.php", true);
    r.send(f);

}

function timeUp(id) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Status Changed Successfully.");

                window.location.reload();

            } else {

                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);

            }

        }
    }

    r.open("GET", "timeUpProcess.php?id=" + id, true);
    r.send();
}

function addMark(assignment, student) {
    var mark = document.getElementById("mark");

    var f = new FormData();

    f.append("assignment", assignment);
    f.append("student", student);
    f.append("mark", mark.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Mark Added Successfully...!");

                window.location.reload();

            } else if (t == "update") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Mark Updated Successfully...!");

                window.location.reload();

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }

        }
    }

    r.open("POST", "addMarkProcess.php", true);
    r.send(f);
}

function studentAssignmentDetail(assignment) {

    var f = new FormData();

    f.append("assignment", assignment);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            document.getElementById("tbl_tr").innerHTML = t;
            // alert(t);

        }
    }

    r.open("POST", "getStudentDetail.php", true);
    r.send(f);

}

function changeAssignmentStatus(assignment, student) {

    var f = new FormData();

    f.append("assignment", assignment);
    f.append("student", student);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Status Updated Successfully...!");

                window.location.reload();

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }

        }
    }

    r.open("POST", "realeaseMarksProcess.php", true);
    r.send(f);

}

function studentAssignmentDetailAdmin(assignment) {

    var f = new FormData();

    f.append("assignment", assignment);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            document.getElementById("tbl_tr").innerHTML = t;
            // alert(t);

        }
    }

    r.open("POST", "getStudentAssignmentDetail.php", true);
    r.send(f);

}

function updateGrade() {

    var f = new FormData();

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Grade Updated Successfully...!");

                window.location = "home.php";

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }

        }
    }

    r.open("POST", "updateGradeProcess.php", true);
    r.send(f);

}