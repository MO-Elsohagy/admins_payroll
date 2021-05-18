/*************************************** Show data in Modal ***************************************/

//#region employees
$(function () {
  $("#archive_employee").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="id"]').val(id);
  });
});
//#endregion employees

//#region departments
$(function () {
  $("#departments_edit").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="departmentId_edit"]').val(id);

    var name = $(e.relatedTarget).data("name");
    $(e.currentTarget).find('input[name="departmentName_edit"]').val(name);
  });
});
$(function () {
  $("#departments_delete").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="departmentId_delete"]').val(id);
  });
});
//#endregion departments

//#region courses
$(function () {
  $("#courses_add").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="departmentId_add"]').val(id);
  });
});
$(function () {
  $("#courses_edit").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="courseId_edit"]').val(id);

    var name = $(e.relatedTarget).data("name");
    $(e.currentTarget).find('input[name="courseName_edit"]').val(name);
  });
});
$(function () {
  $("#courses_delete").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="courseId_delete"]').val(id);
  });
});
//#endregion courses

//#region diplomas
$(function () {
  $("#diplomas_delete").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="diplomaId_delete"]').val(id);
  });
});
//#endregion diplomas

//#region groups
$(function () {
  $("#groups_delete").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="groupId_delete"]').val(id);
  });
});
$(function () {
  $("#studentsLimitIs_Completed").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="groupId_completed"]').val(id);
  });
});
//#endregion groups

//#region Payments
$(function () {
  $("#receiptPayment_Add").on("show.bs.modal", function (e) {
    var money = $(e.relatedTarget).data("money");
    $(e.currentTarget).find('input[name="paymentPaidMoney"]').val(money);
  });
});
$(function () {
  $("#add_payments").on("show.bs.modal", function (e) {
    var receiptsid = $(e.relatedTarget).data("receiptsid");
    $(e.currentTarget).find('input[name="receiptsId"]').val(receiptsid);
  });
});
//#endregion Payments

//#region ads
$(function () {
  $("#update_ads").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="update_adId"]').val(id);

    var name = $(e.relatedTarget).data("name");
    $(e.currentTarget).find('input[name="update_adName"]').val(name);

    var price = $(e.relatedTarget).data("price");
    $(e.currentTarget).find('input[name="update_adPrice"]').val(price);

    var page = $(e.relatedTarget).data("page");
    $(e.currentTarget).find('input[name="update_adPage"]').val(page);
  });
});
$(function () {
  $("#delete_ads").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="delete_adId"]').val(id);
  });
});

$(function () {
  $("#update_adDetails").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="update_adDetailsId"]').val(id);

    var date = $(e.relatedTarget).data("date");
    $(e.currentTarget).find('input[name="update_adDate"]').val(date);

    var messages = $(e.relatedTarget).data("messages");
    $(e.currentTarget).find('input[name="update_messages"]').val(messages);

    var comments = $(e.relatedTarget).data("comments");
    $(e.currentTarget).find('input[name="update_comments"]').val(comments);

    var likes = $(e.relatedTarget).data("likes");
    $(e.currentTarget).find('input[name="update_likes"]').val(likes);

    var clients = $(e.relatedTarget).data("clients");
    $(e.currentTarget).find('input[name="update_clients"]').val(clients);
  });
});
$(function () {
  $("#delete_adDetails").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="delete_adDetailsId"]').val(id);
  });
});
//#endregion ads

//#region knowus
$(function () {
  $("#knowus_edit").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="knowusId_edit"]').val(id);

    var name = $(e.relatedTarget).data("name");
    $(e.currentTarget).find('input[name="knowusName_edit"]').val(name);
  });
});
$(function () {
  $("#knowus_delete").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="knowusId_delete"]').val(id);
  });
});
//#endregion knowus

//#region students
$(function () {
  $("#students_info").on("show.bs.modal", function (e) {
    // var studentid = $(e.relatedTarget).data('studentid');

    var studentname = $(e.relatedTarget).data("studentname");
    $("#studentName_info").empty().append(studentname);

    var phone1 = $(e.relatedTarget).data("phone1");
    phone1 = phone1 === "" ? "لا يوجد" : phone1;
    $("#studentPhone1_info").empty().append(phone1);

    var phone2 = $(e.relatedTarget).data("phone2");
    phone2 = phone2 === "" ? "لا يوجد" : phone2;
    $("#studentPhone2_info").empty().append(phone2);

    var phone3 = $(e.relatedTarget).data("phone3");
    phone3 = phone3 === "" ? "لا يوجد" : phone3;
    $("#studentPhone3_info").empty().append(phone3);

    var globalnotes = $(e.relatedTarget).data("globalnotes");
    globalnotes = globalnotes === "" ? "لا يوجد" : globalnotes;
    $("#globalNotes_info").empty().append(globalnotes);

    var coursesnotes = $(e.relatedTarget).data("coursesnotes");
    coursesnotes = coursesnotes === "" ? "لا يوجد" : coursesnotes;
    $("#coursesNotes_info").empty().append(coursesnotes);

    var branchName = $(e.relatedTarget).data("branchname");
    branchName = branchName === "" ? "لا يوجد" : branchName;
    $("#stCourses_info_branch_name").empty().append(branchName);

    var stcourses = $(e.relatedTarget).data("stcourses");
    stcourses = stcourses === "" ? "لا يوجد" : stcourses;
    $("#stCourses_info").empty().append(stcourses);

    var knowusname = $(e.relatedTarget).data("knowusname");
    knowusname = knowusname === "" ? "لا يوجد" : knowusname;
    $("#knowusName_info").empty().append(knowusname);

    var employeename = $(e.relatedTarget).data("employeename");
    employeename = employeename === "" ? "لا يوجد" : employeename;
    $("#employeeName_info").empty().append(employeename);
  });
});
//#endregion students

//#region Attendance
$(function () {
  $("#attend_student").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="attend_receiptsdetailsId"]').val(id);

    var studentname = $(e.relatedTarget).data("studentname");
    $("#attend_studentName").empty().append(studentname);
  });
});
$(function () {
  $("#absent_student").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="absent_receiptsdetailsId"]').val(id);

    var studentname = $(e.relatedTarget).data("studentname");
    $("#absent_studentName").empty().append(studentname);
  });
});
$(function () {
  $("#undo_student").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="undo_receiptsdetailsId"]').val(id);

    var studentname = $(e.relatedTarget).data("studentname");
    $("#undo_studentName").empty().append(studentname);
  });
});

$(function () {
  $("#feedback_edit").on("show.bs.modal", function (e) {
    var number = $(e.relatedTarget).data("number");
    $(e.currentTarget).find('input[name="feedbackNumber"]').val(number);

    var feedback = $(e.relatedTarget).data("feedback");
    $(e.currentTarget).find('textarea[name="groupFeedback"]').val(feedback);
  });
});
$(function () {
  $("#feedbackStudent_add").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="add_receiptsdetailsId"]').val(id);
  });
});
$(function () {
  $("#feedbackStudent_edit").on("show.bs.modal", function (e) {
    var feedbackid = $(e.relatedTarget).data("feedbackid");
    $(e.currentTarget)
      .find('input[name="update_groupfeedbackId"]')
      .val(feedbackid);

    var feedback = $(e.relatedTarget).data("feedback");
    $(e.currentTarget)
      .find('textarea[name="update_groupfeedbackDetails"]')
      .val(feedback);
  });
});
//#endregion Attendance

//#region pointsOfSale
$(function () {
  $("#pointsOfSale_Pull").on("show.bs.modal", function (e) {
    var studentid = $(e.relatedTarget).data("studentid");
    $(e.currentTarget)
      .find('input[name="pointsofsalesStudentId"]')
      .val(studentid);
  });
});
//#endregion pointsOfSale

//#region reminders
$(function () {
  $("#reminder_Finish").on("show.bs.modal", function (e) {
    var reminderid = $(e.relatedTarget).data("reminderid");
    $(e.currentTarget).find('input[name="finish_reminderId"]').val(reminderid);
  });
});
$(function () {
  $("#reminder_Delete").on("show.bs.modal", function (e) {
    var reminderid = $(e.relatedTarget).data("reminderid");
    $(e.currentTarget).find('input[name="delete_reminderId"]').val(reminderid);
  });
});
//#endregion reminders

//#region set StudentInGroup
$(function () {
  $("#set_StudentInGroup").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="set_receiptsdetailsId"]').val(id);

    var course = $(e.relatedTarget).data("course");
    var branch = $(e.relatedTarget).data("branch");
    callAjaxChangeDialog(
      "../uiInc/dialogOfGroupsSet.php?courseId=" +
        course +
        "&branchId=" +
        branch,
      ["set_groupId"]
    );
  });
});
//#endregion set StudentInGroup

//#region loginStatus of sales employees
$(function () {
  $("#employees_acceptLoggedIn").on("show.bs.modal", function (e) {
    var employeeid = $(e.relatedTarget).data("employeeid");
    $(e.currentTarget)
      .find('input[name="acceptLoggedIn_employeeId"]')
      .val(employeeid);
  });
});
$(function () {
  $("#employees_logout").on("show.bs.modal", function (e) {
    var employeeid = $(e.relatedTarget).data("employeeid");
    $(e.currentTarget).find('input[name="logout_employeeId"]').val(employeeid);
  });
});
//#endregion loginStatus of sales employees

//#region Expenses
$(function () {
  $("#edit_expenses").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="update_expenseId"]').val(id);

    var expensestype = $(e.relatedTarget).data("expensestype");
    $(e.currentTarget)
      .find('select[name="update_expenseExpensesTypeId"]')
      .val(expensestype);

    var money = $(e.relatedTarget).data("money");
    $(e.currentTarget).find('input[name="update_expenseMoney"]').val(money);

    var branch = $(e.relatedTarget).data("branch");
    $(e.currentTarget)
      .find('select[name="update_expenseBranchId"]')
      .val(branch);

    var notes = $(e.relatedTarget).data("notes");
    $(e.currentTarget).find('textarea[name="update_expenseNotes"]').val(notes);
  });
});
$(function () {
  $("#delete_expenses").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="delete_expenseId"]').val(id);
  });
});
//#endregion Expenses

//#region Revenues
$(function () {
  $("#edit_revenues").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="update_revenueId"]').val(id);

    var revenuestype = $(e.relatedTarget).data("revenuestype");
    $(e.currentTarget)
      .find('select[name="update_revenueRevenuesTypeId"]')
      .val(revenuestype);

    var money = $(e.relatedTarget).data("money");
    $(e.currentTarget).find('input[name="update_revenueMoney"]').val(money);

    var branch = $(e.relatedTarget).data("branch");
    $(e.currentTarget)
      .find('select[name="update_revenueBranchId"]')
      .val(branch);

    var notes = $(e.relatedTarget).data("notes");
    $(e.currentTarget).find('textarea[name="update_revenueNotes"]').val(notes);
  });
});
$(function () {
  $("#delete_revenues").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="delete_revenueId"]').val(id);
  });
});
//#endregion Revenues

//#region ExpensesType
$(function () {
  $("#edit_expensesType").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="update_expensesTypeId"]').val(id);

    var name = $(e.relatedTarget).data("name");
    $(e.currentTarget).find('input[name="update_expensesTypeName"]').val(name);
  });
});
$(function () {
  $("#delete_expensesType").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="delete_expensesTypeId"]').val(id);
  });
});
//#endregion ExpensesType

//#region RevenuesType
$(function () {
  $("#edit_revenuesType").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="update_revenuesTypeId"]').val(id);

    var name = $(e.relatedTarget).data("name");
    $(e.currentTarget).find('input[name="update_revenuesTypeName"]').val(name);
  });
});
$(function () {
  $("#delete_revenuesType").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="delete_revenuesTypeId"]').val(id);
  });
});
//#endregion RevenuesType

//#region CertificatesApprovedTypes
$(function () {
  $("#edit_CertificatesApprovedTypes").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget)
      .find('input[name="update_certificatesApprovedTypeId"]')
      .val(id);

    var name = $(e.relatedTarget).data("name");
    $(e.currentTarget)
      .find('input[name="update_certificatesApprovedTypeName"]')
      .val(name);

    var price = $(e.relatedTarget).data("price");
    $(e.currentTarget)
      .find('input[name="update_certificatesApprovedTypePrice"]')
      .val(price);
  });
});
$(function () {
  $("#delete_CertificatesApprovedTypes").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget)
      .find('input[name="delete_certificatesApprovedTypeId"]')
      .val(id);
  });
});
//#endregion CertificatesApprovedTypes

//#region Certificate
$(function () {
  $("#extract_Certificate").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="extract_certificateId"]').val(id);

    var studentname = $(e.relatedTarget).data("studentname");
    $("#extract_studentName").empty().append(studentname);
  });
});

$(function () {
  $("#addPaid_certificate").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="addPaid_certificateId"]').val(id);
  });
});
$(function () {
  $("#updatePaid_certificate").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="updatePaid_certificateId"]').val(id);

    var money = $(e.relatedTarget).data("money");
    $(e.currentTarget)
      .find('input[name="updatePaid_certificateMoney"]')
      .val(money);
  });
});

$(function () {
  $("#send_CertificatesApproved").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="send_receiptdetailsId"]').val(id);
  });
});
$(function () {
  $("#export_CertificatesApproved").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget)
      .find('input[name="export_certificatesApprovedId"]')
      .val(id);

    var studentname = $(e.relatedTarget).data("studentname");
    $("#export_studentName").empty().append(studentname);
  });
});
$(function () {
  $("#receive_CertificatesApproved").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget)
      .find('input[name="receive_certificatesApprovedId"]')
      .val(id);

    var studentname = $(e.relatedTarget).data("studentname");
    $("#receive_studentName").empty().append(studentname);
  });
});

$(function () {
  $("#paid_CertificatesApproved").on("show.bs.modal", function (e) {
    var money = $(e.relatedTarget).data("money");
    $(e.currentTarget).find('input[name="paid_money"]').val(money);
  });
});
//#endregion Certificate

//#region Policies
$(function () {
  $("#edit_policy").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="update_policyId"]').val(id);

    var title = $(e.relatedTarget).data("title");
    $(e.currentTarget).find('input[name="update_policyTitile"]').val(title);

    var details = $(e.relatedTarget).data("details");
    $(e.currentTarget)
      .find('textarea[name="update_policyDetails"]')
      .val(details);
  });
});
$(function () {
  $("#delete_policy").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $(e.currentTarget).find('input[name="delete_policyId"]').val(id);
  });
});
//#endregion Policies
