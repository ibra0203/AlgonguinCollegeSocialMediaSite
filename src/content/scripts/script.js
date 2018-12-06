/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function filterString(s) {
    const map = {
      '&': '',
      '<': '',
      '>': '',
      '"': '',
      "'": '',
      "/": '',
      "\\": ''
  };
  const reg = /[&<>"'/]/ig;
  return s.replace(reg, (match)=>(map[match]));
}