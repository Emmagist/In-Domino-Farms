
// // Add Category
// $('#categoryForm').submit(function (e) {
//     e.preventDefault();
//     const formData = new FormData(this);

//     $.ajax({
//         url: '../../libs/fetchAjax.php?pg=200',
//         method: 'POST',
//         dataType: 'json',
//         data: formData,
//         contentType: false,
//         processData: false,
//         // cache: false,
//         success: (param) => { 
//             if (param.success) {
                
//                 $('.categorySuccess').fadeIn()
//                 $('.categorySuccess').text(param.success);
//                 setInterval(() => {
//                     $('.categorySuccess').fadeOut();
//                     location.reload();
//                 }, 3000);
//             }else if(param.error){
//                 $('.categoryError').fadeIn()
//                 $('.categoryError').text(param.error);
//                 setInterval(() => {
//                     $('.categoryError').fadeOut();
//                 }, 3000);
//             }
//         },
//     });
//     return false;
// });

