<x-guest-layout>
    <div class="showOneArticles">
    </div>
    <div id="app"> </div>
    <script>

        function getRandomInt(max) {
            return Math.floor(Math.random() * max);
        }
        function apiPicture(){
            fetch('https://collectionapi.metmuseum.org/public/collection/v1/objects/' + getRandomInt(1000))
                .then(function(response){
                    return response.json();
                })
                .then(function(picture){
                    let image = document.getElementById('image')
                    image.setAttribute('src', picture.primaryImage)
                })
                .catch(error=> {
                    return error
                })
        }

        let url = window.location.href;
        let urlId = url.substring(url.lastIndexOf('/') + 1);

        fetch( '/api/article/' + urlId)
            .then(function(response) {
                return response.json();
            })
            .then(function(article) {
                let html = '';

                html+=
                    ` <a href="/js/articles/${article.id}">
                        <h3 class="text-xl hover:bg-blue-500">${article.title}</h3></a>
                        <h4>${article.created_at}</h4>
                        <h3><b>Nombre de commentaire :${article.comments_count}</b></h3>
                        <p>${article.content}</p>
                        <img id="image" >`
                apiPicture()
                for (let comments of article.comments) {
                    let userCase;
                    if(comments.user_id ==null){
                       userCase = comments.guest_pseudo
                    }else{
                        userCase = comments.user.firstname
                    }

                    html +=
                        `
                        <p>Commentaire :</p>
                        <p>Auteur : ${userCase}</p>
                        <p>créé le  : ${comments.created_at}</p>
                        <p> Contenu : ${comments.content}</p>`
                }
                let app=document.querySelector('#app');
                app.innerHTML=html;
            })
             .catch(error=> {
            console.log(error)
        })
    </script>
</x-guest-layout>
