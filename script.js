document.addEventListener('DOMContentLoaded',function(){
  const el=document.getElementById('clientTime'); if(el) el.textContent=new Date().toLocaleString();
  function setCookie(n,v,d){const x=new Date();x.setTime(x.getTime()+d*24*60*60*1000);document.cookie=n+'='+encodeURIComponent(v)+';path=/;expires='+x.toUTCString();}
  function getCookie(n){const p=document.cookie.split(';').map(s=>s.trim());for(const q of p){if(q.startsWith(n+'='))return decodeURIComponent(q.split('=')[1]);}return '';}
  const saved=getCookie('applicantName'); if(saved) console.log('Welcome back',saved);
  const form=document.getElementById('applyForm'); if(form){form.addEventListener('submit',function(e){const name=document.getElementById('name').value.trim();const email=document.getElementById('email').value.trim(); if(!name||!email){alert('Please enter name and email');e.preventDefault();return;} if(!/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(email)){alert('Enter valid email');e.preventDefault();return;} setCookie('applicantName',name,7); alert('Application submitted. Thank you, '+name+'!');});}
});