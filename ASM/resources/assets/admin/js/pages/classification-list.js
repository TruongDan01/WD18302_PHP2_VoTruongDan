if (document.getElementById('teacher-list')) {
    const dataTableSearch = new simpleDatatables.DataTable("#teacher-list", {
        searchable: true,
        fixedHeight: false,
        perPage: 7
    });

    document.querySelectorAll(".export").forEach(function (el) {
        el.addEventListener("click", function (e) {
            var type = el.dataset.type;

            var data = {
                type: type,
                filename: "soft-ui-" + type,
            };

            if (type === "csv") {
                data.columnDelimiter = "|";
            }

            dataTableSearch.export(data);
        });
    });
};

if (document.getElementById('publisher-list')) {
    const dataTableSearch = new simpleDatatables.DataTable("#publisher-list", {
        searchable: true,
        fixedHeight: false,
        perPage: 7
    });

    document.querySelectorAll(".export-publisher-list").forEach(function (el) {
        el.addEventListener("click", function (e) {
            var type = el.dataset.type;

            var data = {
                type: type,
                filename: "soft-ui-" + type,
            };

            if (type === "csv") {
                data.columnDelimiter = "|";
            }

            dataTableSearch.export(data);
        });
    });
};

if (document.getElementById('authors-list')) {
    const dataTableSearch = new simpleDatatables.DataTable("#authors-list", {
        searchable: true,
        fixedHeight: false,
        perPage: 7
    });

    document.querySelectorAll(".export-authors-list").forEach(function (el) {
        el.addEventListener("click", function (e) {
            var type = el.dataset.type;

            var data = {
                type: type,
                filename: "soft-ui-" + type,
            };

            if (type === "csv") {
                data.columnDelimiter = "|";
            }

            dataTableSearch.export(data);
        });
    });
};

// Validate 

// // Validate form add
// Validator({
//     form: '#form-add-category',
//     formGroupSelector: '.form-group',
//     errorSelector: '.form-message',
//     modal: '#form-modal-add-category',
//     rules: [
//         Validator.isRequired('.input-group input[name="name"]', '* Vui lòng nhập tên danh mục !'),
//         Validator.isRequired('.input-group select[name="status"]', '* Vui lòng chọn trạng thái !')
//     ],
// });

// Validator({
//     form: '#form-add-author',
//     formGroupSelector: '.form-group',
//     errorSelector: '.form-message',
//     modal: '#form-modal-add-author',
//     rules: [
//         Validator.isRequired('.input-group input[name="name"]', '* Vui lòng nhập tên tác giả !'),
//         Validator.isRequired('.input-group input[name="bio"]', '* Vui lòng nhập tiểu sử tác giả !'),
//     ]
// });

// Validator({
//     form: '#form-add-publisher',
//     formGroupSelector: '.form-group',
//     errorSelector: '.form-message',
//     modal: '#form-modal-add-publisher',
//     rules: [
//         Validator.isRequired('.input-group input[name="name"]', '* Vui lòng nhập tên nhà xuất bản !'),
//         Validator.isRequired('.input-group input[name="address"]', '* Vui lòng nhập địa chỉ nhà xuất bản !'),
//         Validator.isRequired('.input-group input[name="contact"]', '* Vui lòng nhập thông tin nhà xuất bản !'),
//     ]
// });

// //Validate a group of edit forms

// // Validate a group of category edit forms
// ValidatorFormsModal({
//     modalGroup: '.edit-modal-group',
//     modalEles: '[id^="category-edit_"]',
//     form: '#form-edit-category',
//     rules: [
//         Validator.isRequired('.input-group input[name="name"]', '* Vui lòng nhập tên danh mục !'),
//     ]
// });

// // Validate a group of author edit forms
// ValidatorFormsModal({
//     modalGroup: '.edit-modal-group',
//     modalEles: '[id^="author-edit_"]',
//     form: '#form-edit-author',
//     rules: [
//         Validator.isRequired('.input-group input[name="name"]', '* Tên tác giả không được bỏ trống !'),
//         Validator.isRequired('.input-group input[name="bio"]', '* Tiểu sử tác giả không được bỏ trống !')
//     ],
// });
// // Validate a group of publisher edit forms
// ValidatorFormsModal({
//     modalGroup: '.edit-modal-group',
//     modalEles: '[id^="publisher-edit_"]',
//     form: '#form-edit-pulisher',
//     rules: [
//         Validator.isRequired('.input-group input[name="name"]', '* Tên nhà xuất bản không được bỏ trống !'),
//         Validator.isRequired('.input-group input[name="address"]', '* Địa chỉ không được bỏ trống !'),
//         Validator.isRequired('.input-group input[name="contact"]', '* Thông tin liên hệ không được bỏ trống !'),
//     ],
// })