// Basic JS demonstrating variables, operators, loops, decision controls, functions, cookies, arrays, Date
document.addEventListener('DOMContentLoaded', function(){
  // Date display
  const now = new Date();
  const el = document.getElementById('clientTime');
  if(el) el.textContent = now.toLocaleString();

  // Cookie: remember name if present
  function setCookie(name,value,days){ const d=new Date(); d.setTime(d.getTime()+days*24*60*60*1000); document.cookie = name+'='+encodeURIComponent(value)+';path=/;expires='+d.toUTCString(); }
  function getCookie(name){ const parts = document.cookie.split(';').map(s=>s.trim()); for(let p of parts){ if(p.startsWith(name+'=')) return decodeURIComponent(p.split('=')[1]); } return ''; }

  const saved = getCookie('applicantName');
  if(saved){
    console.log('Welcome back,', saved);
  }

  // Form validation
  const form = document.getElementById('applyForm');
  if(form){
    form.addEventListener('submit', function(e){
      const name = document.getElementById('name').value.trim();
      const email = document.getElementById('email').value.trim();
      if(!name || !email){ alert('Please enter name and email.'); e.preventDefault(); return; }
      // Basic email check
      if(!/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(email)){ alert('Please enter a valid email.'); e.preventDefault(); return; }
      // set cookie for 7 days
      setCookie('applicantName', name, 7);
      // add a small dynamic confirmation
      alert('Application submitted. Thank you, ' + name + '!');
    });
  }

  // Demonstrate arrays and loops
  const companies = ['PixelSoft','BlueWave','CloudNine'];
  for(let i=0;i<companies.length;i++){
    // simple operator
    if(companies[i].length > 6){
      // console log as demo
      console.log('Company:', companies[i]);
    }
  }

  // Function example
  function estimateSalary(base, multiplier){
    return base * multiplier;
  }
  console.log('Example salary estimate:', estimateSalary(30000,1.2));
});
