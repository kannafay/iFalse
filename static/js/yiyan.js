fetch('https://v1.hitokoto.cn')
    .then(response => response.json())
    .then(data => {
      const hitokoto = document.getElementById('hitokoto_text')
      const hitokoto_author = document.getElementById('hitokoto_author')
      if(hitokoto) {
        hitokoto.innerText = data.hitokoto
      }
      if(hitokoto_author) {
        hitokoto_author.innerText = data.from_who
      }
    })
    .catch(console.error)