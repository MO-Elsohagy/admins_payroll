<?php
#region database
define("_showedBranches", "1");
define("_hiddenBranches", "0");
define("_noDataIsExist", "لا يوجد بيانات");
define("_notAdded", "لم يتم الأضافة");
define("_notChanged", "لم تغير اي البيانات");
define("_notDeleted", "لم يتم الحذف");
#endregion database

#region functions
define("_status", "status");
define("_statusSuccess", 1);
define("_statusFailure", 0);
define("_msg", "msg");
define("_success", "عملية ناجحة");
define("_failure", "عملية فاشلة");
define("_insertAllData", "برجاء أدخال جميع البيانات");
define("_imgExtentions", "امتدادات الصورة هي png, jpg, jpeg");
define("_imgSizeIsLong", "مساحة الصورة لا تزيد عن ٣٠ ميجا");
define("_imgError", "فشل تحميل الصورة");
define("_dateFormatIsWrong", "صيغة التاريخ غير صحيحة");
define("_insertAllDataStar", "برجاء ادخال جميع البيانات المطلوبة *");
define("_wrongPasswordOrPhone", "يوجد خطأ برقم الهاتف او كلمة المرور");
define("_youHaveNotThisPrivilege", "أنت لا تملك هذة الصلاحية");
define("_inputLength", 50);
define("_textareaLength", 500);

define("_phoneIsValid", "رقم الهاتف صحيح");
define("_phoneNotValid", "رقم الهاتف غير صحيح");
define("_phoneMustBeNumber", "رقم الهاتف يجب ان يكون رقم");
define("_phoneMustBeNotFixed", "رقم الهاتف لا يجب ان يكون رقم ارضي");
define("_emailIsWrong", "البريد الإلكتروني غير صحيح");
define("_passwordNotMatch", "كلمتان المرور غير متوافين");
define("_passwordMustBeGreater", "كلمة المرور يجب ان تكون اكثر من 8 حروف");
define("_passwordMustBeLess", "كلمة المرور يجب ان تكون اقل من 16 حروف");
define("_passwordNotValid", "كلمة المرور يجب أن تحتوي علي حرف صغير و أخر كبير ورقم وحرف خاص");
define("_passwordIsValid", "كلمة المرور محققة");

define("_theNumber", "الرقم");
define("_numberIsNotNumber", "الرقم المدخل ليس رقم");
define("_minNumberIsNotNumber", "القيمة الصغرى ليست رقم");
define("_maxNumberIsNotNumber", "القيمة الكبرى ليست رقم");
define("_dateFromMustBeBeforeDateTo", "التاريخ (من) يجب ألا يتعدى التاريخ (بعد)");
define("_timeFromFormatIsWrong", "صيغة الوقت (من) غير صحيحة");
define("_timeToFormatIsWrong", "صيغة الوقت (بعد) غير صحيحة");

define("_closeModal", "<button type='button' class='btn btn-close' data-dismiss='modal'><i class='fa fa-times'></i></button>");
define("_iconErr", "<img class='icon-err' src='../assets/images/noData.svg'>");
#endregion functions

#region general msgs
define("_alertStartDanger", "<p class='alert alert-danger text-center'>");
define("_alertStartSuccess", "<p class='alert alert-success text-center'>");
define("_alertEnd", "</p>");
define("_msgInsertAllData", "<p class='alert alert-danger text-center'>برجاء ادخال جميع البيانات المطلوبة *</p>");
define("_requiredStar", " <span class='required'>*</span>");

define("_startTimeNotGreaterThanEndTime", "وقت البداية لا يجب ان يكون اكبر من او يساوي وقت النهاية");
define("_startDateNotGreaterThanEndDate", "تاريخ البداية لا يجب ان يكون اكبر من تاريخ النهاية");
define("_dateCanNotBeAfterToday", "التاريخ لا يجب أن يكون بعد اليوم");
#endregion general msgs

#region ads
define("_adNameMustBeNumber", "اسم الإعلان يجب أن يكون بين 3 حروف و 50 حرف");
define("_adPriceMustBeNumber", "مبلغ الإعلان يجب أن يكون رقم بين الصفر والمليون");
define("_adPageMustBeNumber", "صفحة الإعلان يجب أن يكون بين 3 حروف و 50 حرف");
define("_thisAdIsNotExist", "هذا الإعلان غير موجود من قبل");
define("_messagesMustBeNumber", "عدد الرسائل يجب أن تكون رقم بين الصفر والمليون");
define("_commentsMustBeNumber", "عدد التعليقات يجب أن تكون رقم بين الصفر والمليون");
define("_likesMustBeNumber", "عدد الإعجابات يجب أن تكون رقم بين الصفر والمليون");
define("_clientsMustBeNumber", "عدد العملاء يجب أن تكون رقم بين الصفر والمليون");
#endregion ads

#region branches
define("_thisBranchIsExist", "هذا الفرع موجود من قبل");
define("_thisBranchIsNotExist", "هذا الفرع غير موجود");
define("_pleaseSelectBranch", "برجاء اختيار فرع صحيح");
#endregion branches

#region Departments
define("_thisDepartmentIsNotExist", "هذا القسم غير موجود");
define("_departmentNameIsExist", "اسم القسم موجود من قبل");
define("_canNotDeleteDepartmentRelatedByCourse", "لا يمكن حذف القسم، هذا القسم مرتبط بكورس");
define("_canNotDeleteDepartmentRelatedByDiploma", "لا يمكن حذف القسم، هذا القسم مرتبط بدبلومة");
define("_canNotEditDepartmentRelatedByCourse", "لا يمكن تعديل القسم، هذا القسم مرتبط بكورس");
define("_canNotEditDepartmentRelatedByDiploma", "لا يمكن تعديل القسم، هذا القسم مرتبط بدبلومة");
#endregion Departments

#region Courses
define("_thisCourseIsNotExist", "هذا الكورس غير موجود");
define("_canNotDeleteCourseRelatedByGroup", "لا يمكن حذف الكورس، هذا الكورس مرتبط بجروب");
define("_canNotDeleteCourseRelatedByStudent", "لا يمكن حذف الكورس، هذا الكورس مرتبط بطالب");
define("_canNotEditCourseRelatedByGroup", "لا يمكن تعديل الكورس، هذا الكورس مرتبط بجروب");
define("_canNotEditCourseRelatedByStudent", "لا يمكن تعديل الكورس، هذا الكورس مرتبط بطالب");
#endregion Courses

#region Diplomas
define("_pleasSelectDiploma", "برجاء اختيار دبلومة صحيحة");
define("_thisDiplomaIsNotExist", "هذه الدبلومة غير موجودة");
define("_canNotDeleteDiplomaRelatedByGroup", "لا يمكن حذف الدبلومة، هذه الدبلومة مرتبطة بجروب");
define("_canNotDeleteDiplomaRelatedByStudent", "لا يمكن حذف الدبلومة، هذه الدبلومة مرتبطة بطالب");
define("_canNotEditDiplomaRelatedByGroup", "لا يمكن تعديل الدبلومة، هذه الدبلومة مرتبطة بجروب");
define("_canNotEditDiplomaRelatedByStudent", "لا يمكن تعديل الدبلومة، هذه الدبلومة مرتبطة بطالب");
#endregion Diplomas

#region groups
define("_noBranchesExist", "لا يوجد فروع");
define("_noDepartmentsExist", "لا يوجد أقسام");
define("_noCoursesExist", "لا يوجد كورسات");
define("_noDiplomasExist", "لا يوجد دبلومات");
define("_courseNotExist", "هذا الكورس غير موجود");
define("_diplomaNotExist", "هذه الدبلومه غير موجود");
define("_groupNotExist", "هذا الجروب غير موجود");
define("_groupNotEditable", "هذا الجروب غير قابل للتعديل");
define("_groupNotDeletable", "هذا الجروب غير قابل للحذف");
define("_groupNotFinishedYet", "هذا الجروب لم ينتهي بعد");
define("_insertGroupName", "برجاء ادخال اسم الجروب");
define("_insertDayAtleast", "برجاء اختيار يوم عالأقل");
define("_thisDayIsWrong", "برجاء اخيار يوم صحيح");
define("_startDayBeforeNow", "يوم بداية الكورس لا يجب ان يكون قبل اليوم");
define("_groupNameIsExist", "يوجد نفس اسم الجروب، برجاء ادخال اسم اخر");
define("_chooseAtLeastOneCourse", "اختر كورس عالأقل");
define("_courseIdMustBeNumber", "courseId يجب ان يكون رقم");
define("_diplomaIdMustBeNumber", "diplomaId يجب ان يكون رقم");
define("_coursesMustBeArray", "الكورسات يجب ان تكون Array");
define("_diplomasMustBeArray", "الدبلومات يجب ان تكون Array");
define("_insertFeedback", "برجاء إدخال رأي الطلاب");
define("_maxFeedbackNumberIsThree", "أقصى تقييم للجروب هو 3");
define("_insertGroupFeedback", "برجاء إدخال تقييم الجروب");
define("_thisStudentIsNotExistInThisGroup", "هذا الطالب غير موجود في هذا الجروب");
define("_selectFeedbackRight", "برجاء اختيار تقييم صحيح");
#endregion groups

#region employees
define("_youAreNotAllowedToBeInThisPage", "هذه الصفحة غير متاحة لك");
define("_youAreAlreadyLogin", "لقد قمت بتسجيل الدخول بالفعل");
define("_youMustLoginFrist", "برجاء تسجيل الدخول أولاً");
define("_youAreLoginFromOtherDevice", "لقد تم تسجيل الدخول من جهاز آخر، برجاء إعادة تسجيل الدخول");
define("_yourDataAreChanged", "لقد تم تغير بياناتك، برجاء إعادة تسجيل الدخول");
define("_yourPrivilegeAreChanged", "لقد تم تغير صلاحياتك، برجاء إعادة تسجيل الدخول");
define("_employeeIdMustBeNumber", "employeeId يجب ان يكون رقم");
define("_employeeIdIsNotValid", "هذا الموظف غير موجود");
define("_employeeSelect", "اختر الموظف");
define("_selectEmployee", "برجاء اختيار موظف");
#endregion employees

#region students
define("_studentNameIsRequired", "اسم الطالب يجب أن يكون من 3 حروف إلى 50 حرف");
define("_thisStudentIsExist", "هذا الطالب موجود من قبل");
define("_thisStudentIsNotExist", "هذا الطالب غير موجود");
define("_selectCourseOrDiplomaOrNotSelect", "برجاء اختيار كورس او  دبلومة ملاحظات (أخري) او لم يتم اختيار كورس");
define("_selectCourseOrNotSelect", "برجاء اختيار كورس او دبلومة او ملاحظات (أخري) او لم يتم اختيار كورس");
define("_thisStudentInCall", "هذا الطالب في مكالمة مع احد الموظفين");
define("_thisStudentIsNotAllowedForYou", "ليس مسموح لك بالتواصل مع هذا الطالب");

define("_answerd", "تم الرد");
define("_notAnswerd", "لم يتم الرد");
define("_turnOffOrNotAvailable", "مغلق أو غير متاح");
#endregion students

#region Receipts
define("_thisGroupIsNotExistInThisCourse", "عفوا هذا الجروب غير موجود بهذا الكورس");
define("_thisGroupIsFinished", "لقد انتهى هذا الجروب ولا يمكن تسجيل عميل به");
define("_thisGroupStudentsLimitIsCompleted", "لقد اكتمل عدد هذا الجروب ولا يمكن تسجيل عميل به");
define("_thisGroupIsFinishedForFeedback", "لقد انتهى هذا الجروب ولا يمكن تسجيل تقييم للجروب");
define("_branchIdIsWrong", "برجاء اختيار فرع صحيح");
define("_departmentIdIsWrong", "برجاء اختيار قسم صحيح");
define("_courseIdIsWrong", "برجاء اختيار كورس صحيح");
define("_groupIdIsWrong", "برجاء اختيار جروب صحيح");
define("_pricesListIdIsWrong", "برجاء اختيار طريقة حساب صحيحة");
define("_receiptIdIsWrong", "برجاء اختيار إيصال صحيح");
define("_noPaymentsIsExist", "لا يوجد مدفوعات");
define("_selectedPriceMustBeGreaterThanZero", "برجاء أختيار سعر أكبر من صفر");
define("_additionOrDiscountMoneyMustBeLessThanSelectedPrice", "سعر الخصم يجب أن يكون أقل من سعر الكورس المختار");
define("_batch0PaidMoneyIsWrong", "مبلغ المقدم غير صحيح");
define("_batch1PaidMoneyIsWrong", "مبلغ الدفعة الأولي غير صحيح");
define("_batch2PaidMoneyIsWrong", "مبلغ الدفعة الثانية غير صحيح");
define("_batch3PaidMoneyIsWrong", "مبلغ الدفعة الثالثة غير صحيح");
define("_batch4PaidMoneyIsWrong", "مبلغ الدفعة الرابعة غير صحيح");
define("_batch5PaidMoneyIsWrong", "مبلغ الدفعة الخامسة غير صحيح");
define("_batchPaidMoneyNotEmpty", "لا يجب إدخال قيمة دفعة بصفر في حالة وجود دفعات تليها");
define("_sumPaidMoneyIsWrong", "مجموع مبالغ الدفعات يجب أن يكون ");
define("_batch0PaidDateMustBeInserted", "يجب إدخال  تاريخ المقدم");
define("_batch1PaidDateMustBeInserted", "يجب إدخال  تاريخ الدفعة الأولي");
define("_batch2PaidDateMustBeInserted", "يجب إدخال  تاريخ الدفعة الثانية");
define("_batch3PaidDateMustBeInserted", "يجب إدخال  تاريخ الدفعة الثالثة");
define("_batch4PaidDateMustBeInserted", "يجب إدخال  تاريخ الدفعة الرابعة");
define("_batch5PaidDateMustBeInserted", "يجب إدخال  تاريخ الدفعة الخامسة");
define("_batch0PaidDateIsWrong", "صيغة تاريخ المقدم غير صحيحة");
define("_batch1PaidDateIsWrong", "صيغة تاريخ الدفعة الأولي غير صحيحة");
define("_batch2PaidDateIsWrong", "صيغة تاريخ الدفعة الثانية غير صحيحة");
define("_batch3PaidDateIsWrong", "صيغة تاريخ الدفعة الثالثة غير صحيحة");
define("_batch4PaidDateIsWrong", "صيغة تاريخ الدفعة الرابعة غير صحيحة");
define("_batch5PaidDateIsWrong", "صيغة تاريخ الدفعة الخامسة غير صحيحة");
define("_batch0NotesLengthIsWrong", "ملاحظات المقدم يجب أن تكون بين 3 حروف إلي 500 حرف");
define("_batch1NotesLengthIsWrong", "ملاحظات الدفعة الأولي يجب أن تكون بين 3 حروف إلي 500 حرف");
define("_batch2NotesLengthIsWrong", "ملاحظات الدفعة الأولي يجب أن تكون بين 3 حروف إلي 500 حرف");
define("_batch3NotesLengthIsWrong", "ملاحظات الدفعة الأولي يجب أن تكون بين 3 حروف إلي 500 حرف");
define("_batch4NotesLengthIsWrong", "ملاحظات الدفعة الأولي يجب أن تكون بين 3 حروف إلي 500 حرف");
define("_batch5NotesLengthIsWrong", "ملاحظات الدفعة الأولي يجب أن تكون بين 3 حروف إلي 500 حرف");
define("_thisStudentExistThisGroup", "هذا الطالب موجود بالفعل في جروب من قبل");
define("_thisStudentExistThisCourse", "هذا الطالب موجود بالفعل في هذا الكورس من قبل");
define("_thisStudentExistThisDiploma", "هذا الطالب موجود بالفعل في هذه الدبلومة من قبل");
#endregion Receipts

#region payments
define("_msgInsertAllDataWithNewGroup", "برجاء ادخال جميع البيانات المطلوبة *");
define("_moneyMustBeANumbers", "المبالغ يجب ان تكون ارقام");
define("_paidMustBeLessThanTotal", "المبلغ المدفوع يجب ان يكون اقل من او يساوي المبلغ الكلي واكبر من او يساوي صفر");
define("_thisPaymentMethodIsNotExist", "طريقة الدفع التي اخترتها غير موجودة بالنظام");
define("_thisStudentReservateThisCourse", "هذا الطالب حجز هذا الكورس في نفس الجروب");
#endregion payments

#region Refund
define("_selectRefundMoneyOrPercentage", "برجاء اختيار إسترداد بالمبلغ أو إسترداد بالنسبة");
define("_refundMoneyMustBeNumber", "مبلغ الإسترداد يجب أن يكون رقم بين الصفر والمليون");
define("_refundPercentageMustBeNumber", "نسبة الإسترداد يجب أن تكون رقم بين الصفر والمائة");
define("_thisGroupIsFinishedCanNotRefund", "لقد انتهى هذا الجروب ولا يمكن الإسترداد");
define("_refundNotesMustBeRequired", "الملاحظات يجب أن تكون من 3 حروف إلي 500 حرف");
define("_thisReceiptIsReunded", "هذا الإيصال تم إسترداده من قبل");
#endregion Refund

#region Postpone
define("_postponeWantedDate", "التاريخ المراد التأجيل له");
define("_receiptsdetailsIdIsWrong", "برجاء اختيار طالب صحيح");
define("_additionOrDiscountStatus", "حالة التسوية");
define("_selectAdditionOrDiscount", "اختر حالة التسوية");
define("_pleaseSelectAdditionOrDiscount", "برجاء اختيار حالة التسوية");
define("_inCaseNoneMoneyMustBeZero", "في حالة (لا شيء) المبلغ يجب أن يكون صفر");
define("_moneyMustBeNumber", "المبلغ يجب أن يكون رقم بين الصفر والمليون");
define("_thisGroupIsFinishedCanNotPostpone", "لقد انتهى هذا الجروب ولا يمكن التأجيل");
define("_notesMustBeRequired", "الملاحظات يجب أن تكون من 3 حروف إلي 500 حرف");
define("_thisStudentIsPostponed", "هذا العميل قام بالتأجيل من قبل");
#endregion Postpone

#region Transformation
define("_pleaseSelectTransformationStatus", "برجاء اختيار حالة التحويل");
define("_canNotTransformToSameBranch", "لا يمكن التحويل لنفس الفرع");
define("_canNotTransformToSameGroup", "لا يمكن التحويل لنفس الجروب");
define("_thisGroupIsFinishedCanNotTransformation", "لقد انتهى هذا الجروب ولا يمكن التحويل");
#endregion Transformation

#region pointsofsales
define("_pointsofsalesStatusIsWrong", "برجاء اختيار نوع عملية صحيح (إضافة أم سحب)");
define("_pointsofsalesStudentIsWrong", "برجاء اختيار طالب صحيح (نقاط البيع)");
define("_pointsofsalesAddedPointsIsWrong", "عدد النقاط المضافة يجب أن يكون رقم أكبر من 0 وأصغر من 1000000 (نقاط البيع)");
define("_pointsofsalesDrawnPointsIsWrong", "عدد النقاط المسحوبة يجب أن يكون رقم أكبر من 0 وأصغر من 1000000 (نقاط البيع)");
define("_pointsofsalesDrawnPointsIsLargerThanTotal", "عدد النقاط المسحوبة يجب أن يكون رقم أصغر من ");
define("_pointsofsalesThisStudentNotHavePoints", "هذا العميل ليس له أي نقاط");
define("_pointsofsalesMoneyOfDrawnPointsIsWrong", "مبلغ النقاط المسحوبة يجب أن يكون رقم أكبر من 0 وأصغر من 1000000 (نقاط البيع)");
#endregion pointsofsales

#region Reminder
define("_selectDateForReminderIsWrong", "صيغة تاريخ التذكير غير صحيحة");
define("_selectDateForReminder", "برجاء اختيار تاريخ التذكير");
define("_reminderDateSelectedIsEarly", "تاريخ التذكير لا يجب أن يكون قبل الآن");
define("_selectTimeForReminderIsWrong", "صيغة وقت التذكير غير صحيحة");
define("_selectTimeForReminder", "برجاء اختيار وقت التذكير");
define("_reminderTimeSelectedIsEarly", "وقت التذكير لا يجب أن يكون قبل الآن");
define("_reminderIdIsWrong", "برجاء اختيار تذكير صحيح");
#endregion Reminder

#region attendance
define("_lecutersHadFinished", "لقد انتهت جميع المحاضرات");
define("_attendOneLectureAtLeast", "يجب تحضير المحاضر عالأقل محاضرة واحدة، لكي يظهر الطلاب للتحضير");
define("_attendLecturerFrist", "يجب تحضير المحاضر أولاً");
define("_lecutersNotFounded", "لا يوجد محاضرات لهذا الجروب");
define("_attendOrAbsent", "برجاء اختيار حالة العملية (حضور أم انصراف)");
define("_thisDayNotComeTillNow", "هذا اليوم لم يأتي بعد");
define("_noAttended", "هذا الطالب لم يحضر هذا اليوم");
define("_noActionIsExistToUndo", "لا يوجد اي عملية للإلغاء");
define("_noLecturesIsExistToUndo", "لا يوجد اي محاضرة للإلغاء");
define("_canNotUndo", "لا يمكن إلغاء هذا الحضور، تم حضور طلاب في هذة المحاضرة");
define("_insertNotes", "برجاء ادخال الملاحظات");
define("_attended", "تم الحضور");
define("_absent", "غائب");
define("_cancelled", "تم الإلغاء");
define("_unKnown", "غير معروف");
define("_thisStudentIsAlreadyAttended", "تم حضور الطالب مسبقا");
define("_thisStudentIsAlreadyAbsent", "تم غياب الطالب مسبقا");
define("_theRightDayForThisStudentIs", "عفوا، اليوم الصحيح لهذا الطالب هو يوم ");
define("_theRightDayForThisLectureIs", "عفوا، اليوم الصحيح لهذه المحاضرة هو يوم ");
define("_cannotFinishTheGroupBeforeStart", "لا يمكن إنهاء الجروب قبل حضور أي محاضرة");
#endregion attendance

#region knowUs
define("_knowusIdMustBeNumber", "knowusId يجب ان يكون رقم");
define("_knowusIdIsNotValid", "knowusId غير صحيح");
define("_nameIsExist", "يوجد هذا الاسم من قبل");
define("_knowUsNotExist", "اسم العنصر غير موجود");
define("_knowUsMustLessThan50", "اسم العنصر يجب ان يكون اقل من ٥٠ حرف");
define("_knowUsCanNotDeleted", "لا يمكن حذف العنصر، هذا العنصر مرتبط بطالب");
#endregion knowUs

#region Certificates
define("_pleaseSelectCertificateRight", "برجاء اختيار شهادة صحيحة");
define("_certificateHoursMustBeNumber", "عدد الساعات يجب أن تكون رقم بين 0 و 1000000");
define("_certificateDateFormatIsWrong", "صيغة تاريخ الشهادة غير صحيحة");
define("_pleaseSelectCertificate", "برجاء اختيار شهادة صحيحة");
define("_certificateMoneyIsToLong", "مبلغ الشهادة يجب أن يكون رقم بين الصفر والمليون");
#endregion Certificates

#region CertificatesApprovedTypes
define("_certificateNameIsToLong", "اسم الشهادة يجب أن يكون بين 3 و 50 حرف");
define("_certificatePriceIsToLong", "سعر الشهادة يجب أن يكون رقم بين الصفر والمليون");
define("_certificatesApprovedPaidMoneyIsToLong", "المبلغ المدفوع يجب أن يكون رقم بين الصفر والمليون");
define("_thisCertificatesIsNotExist", "هذة الشهادة غير موجودة من قبل");
define("_thisCertificatesTypeIsNotExist", "نوع الشهادة غير موجودة من قبل");
define("_thisStudentDontHaveArcplanCertificate", "لا يجب إستخراج شهادة معتمدة بدون أن يكون له شهادة مركز");
define("_thisStudentHaveACertificateButNotPaidAllMoney", "هذا الطالب له شهادة من قبل، ولم يقم بتسديد المبلغ بالكامل");
define("_paidMoneyMustBeLessThanTotalMoney", "المبغ المدفوع يجب أن يكون أقل من أو يساوي المبلغ الكلي");
define("_pleaseSelectCertificateStatusRight", "برجاء اختيار حالة شهادة صحيحة");
define("_canNotDeleteCertificatesTypeRelatedByStudent", "لا يمكن حذف نوع الشهادة، هذا النوع مرتبط بطالب");
define("_thisCertificateHasNotMoneyForPaid", "هذة الشهادة ليس عليها أي مبالغ للدفع");
define("_moneyForPaidMustBeLessThan", "المبلغ المدفوع يجب أن يكون أقل من ");
define("_thisCertificateIsExported", "هذة الشهادة تم إصدارها من قبل");
define("_thisCertificateIsReceived", "هذة الشهادة تم إستلامها من قبل");
define("_thisCertificateCanNotReceiveBeforeExport", "هذة الشهادة لا يجب إستلامها قبل إصدارها");
define("_thisCertificateCanNotReceiveBeforePaidAllMoney", "هذة الشهادة لا يجب إستلامها قبل سداد كل المبلغ");
define("_selectExportOrRecive", "برجاء اختيار إرسال أو إستلام");
#endregion CertificatesApprovedTypes

#region Settings
define("_selectSettingsSales", "نظام متابعة السيلز المختار غير صحيح");
#endregion Settings

#region Expenses
define("_expenseMoneyMustBeNumber", "مبلغ المصروف يجب أن يكون رقم بين الصفر والمليون");
define("_thisExpenseIsNotExist", "هذا المصروف غير موجود من قبل");
#endregion Expenses

#region Revenues
define("_revenueMoneyMustBeNumber", "مبلغ المصروف يجب أن يكون رقم بين الصفر والمليون");
define("_thisRevenueIsNotExist", "هذا المصروف غير موجود من قبل");
#endregion Revenues

#region ExpensesTypes
define("_pleaseSelectExpensesType", "برجاء اختيار نوع مصروف صحيح");
define("_pleaseInsertExpensesTypeName", "برجاء إدخال نوع المصروف");
define("_expensesTypeNameIsExist", "نوع المصروف موجود من قبل");
define("_thisExpensesTypesIsNotExist", "نوع المصروف غير موجود من قبل");
define("_canNotEditExpensesTypeRelatedByExpenses", "لا يمكن تعديل نوع المصروف، هذا النوع مرتبط بمصروف");
define("_canNotDeleteExpensesTypeRelatedByExpenses", "لا يمكن حذف نوع المصروف، هذا النوع مرتبط بمصروف");
#endregion ExpensesTypes

#region RevenuesTypes
define("_pleaseSelectRevenuesType", "برجاء اختيار نوع إيراد صحيح");
define("_pleaseInsertRevenuesTypeName", "برجاء إدخال نوع الإيراد");
define("_revenuesTypeNameIsExist", "نوع الإيراد موجود من قبل");
define("_thisRevenuesTypesIsNotExist", "نوع الإيراد غير موجود من قبل");
define("_canNotEditRevenuesTypeRelatedByRevenues", "لا يمكن تعديل نوع الإيراد، هذا النوع مرتبط بإيراد");
define("_canNotDeleteRevenuesTypeRelatedByRevenues", "لا يمكن حذف نوع الإيراد، هذا النوع مرتبط بإيراد");
#endregion RevenuesTypes

#region Policies
define("_selectPolicy", "اختر السياسة");
define("_policyTitile", "عنوان السياسة");
define("_policyDetails", "تفاصيل السياسة");
define("_pleaseInsertPolicyTitile", "برجاء إدخال عنوان السياسة");
define("_policyTitileIsExist", "عنوان السياسة موجود من قبل");
define("_thisPolicyIsNotExist", "هذة السياسة غير موجودة من قبل");
define("_canNotEditPolicyTitileRelatedByReceipt", "لا يمكن تعديل السياسة، هذة السياسة مرتبطة بإيصال");
define("_canNotDeletePolicyTitileRelatedByReceipt", "لا يمكن حذف السياسة، هذة السياسة مرتبطة بإيصال");
#endregion Policies
