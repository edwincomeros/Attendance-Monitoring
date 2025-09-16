
setInterval(() => {
  const now = new Date();
  const options = { year: 'numeric', month: 'long', day: 'numeric' };
  const time = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
  document.getElementById('dateTime').innerText = `${now.toLocaleDateString(undefined, options)} | ${time}`;
}, 1000);

