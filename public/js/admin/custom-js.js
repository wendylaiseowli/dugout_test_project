// Set today's date in dd/mm/yyyy format
const today = new Date();
const day = today.getDate().toString().padStart(2, '0');
const month = (today.getMonth() + 1).toString().padStart(2, '0');
const year = today.getFullYear();
// document.querySelector('.last-update')?.value = day + '/' + month + '/' + year;
