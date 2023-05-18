# Welcome to my Final Proyect Backend for the Bootcamp FSD

<details>
  <summary>Content 📝</summary>
  <ol>
    <li><a href="#objective">Objective</a></li>
    <li><a href="#about-the-project">About the project</a></li>
    <li><a href="#stack">Stack</a></li>
    <li><a href="#diagram">Diagram</a></li>
    <li><a href="#installation">Installation</a></li>
    <li><a href="#endpoints">Endpoints</a></li>
    <li><a href="#known-bugs">known bugs</a></li>
    <li><a href="#licence">Licence</a></li>
    <li><a href="#development">Development</a></li>
    <li><a href="#thanks">Thanks</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>

## Objective
The objective of the project is to build both a back and a Front of it, complying with self-imposed minimums, but validated by the teachers.

## About the project
<p>The objective of the project is to develop a backend and frontend for a library of Abandonware and Freeware games. The project will comply with self-imposed minimum requirements and be validated by teachers.</p>
<p>The library will allow users to search for games, add favorites, and view detailed information about each game. The library will focus on games that are no longer sold by companies.</p>
<p>The backend will be developed using PHP with Laravel, and the frontend will use HTML, CSS, React Vite, Bootstrap, and Redux.</p>
You can Find the Front here: https://github.com/AlvaroBernabe/aba-geekshubs-fsd-val-Front-Final-Proyect
The API will provide endpoints to manage the following features:

- Welcome Test.
- Register User.
- Login User.
- Logout.
- Change Password.
- Update/Create Profile. 
- Get My Profile.
- Get All Users as Admin.
- Get Users Details as Admin.
- Delete Users as Admin (you can´t delete yourself or other Admin).
- Change user Role to Admin.
- New Game as Admin.
- Update Game as Admin.
- Get All Games Without Review as User.
- Get All Games As User.
- Get All Games Without Token.
- Search Games with Filter (score, genre,publisher and release date).
- Get Game By ID.
- New Review and Update your Review as User.
- Get My Reviews as User.
- Get My Reviews without Favourites.
- Get My Reviews with Favourites.
- Delete Your Reviews as User.
- Delete Reviews By ID as Admin.
- Get All Reviews as Admin.
- New News as Admin.
- Update News By ID as Admin.
- Delete News By ID as Admin.
- Get All News.


## Stack
Used tech:
<div align="center">

<img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" /> 
<img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" />  
<img src="https://img.shields.io/badge/Docker-2CA5E0?style=for-the-badge&logo=docker&logoColor=white"/> 
<img src="https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white"/> 
<img src="https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white" /> 
<img src="https://img.shields.io/badge/VSCode-0078D4?style=for-the-badge&logo=visual%20studio%20code&logoColor=white" /> 

</div>


## Diagram
<img width="650" alt="image" src="https://user-images.githubusercontent.com/122753448/236231630-bc45237e-5fb7-4933-9112-fbafbfac0cd6.png">



## Installation
This is my Collection for Postman, you can download with all the EndPoints.
[Final Proyect Back.postman_collection.zip](https://github.com/AlvaroBernabe/aba-geekshubs-fsd-val-Backend-Final-Proyect/files/11400115/Final.Proyect.Back.postman_collection.zip)



1. Clone repository in terminal or bash / or download manually the repo.
git clone https://github.com/AlvaroBernabe/aba-geekshubs-fsd-val-Backend-Final-Proyect.git
2. Install dependencies.
composer install
3. Connect repo with database, through env file.
Rename the .env.example to .env and configure the env file to match your Docker config.
4. ``` $ Execute migrations ``` 
php artisan migrate
5. ``` $ Execute seeders ``` 
php artisan db:seed
5.5  If seeders doesn´t finish correcly, keep trying with :D
php artisan migrate:fresh --seed 
6. ``` $ php artisan serve ``` 
7. You are ready to play with Docker or Thunder Client.

## Endpoints
<details>
<summary>Endpoints</summary>


    - WELLCOME
            GET http://127.0.0.1:8000/api/
<img width="358" alt="30- Wellcome" src="https://user-images.githubusercontent.com/122753448/236261970-b5a79340-f5f9-4f36-8e73-0e557e6321da.png">

    
    - REGISTER
            POST http://127.0.0.1:8000/api/register
<img width="314" alt="1Register" src="https://user-images.githubusercontent.com/122753448/236270535-1489a67a-2ad8-4e0f-86d2-a600ff18ee1d.png">



    - LOGIN
            POST http://127.0.0.1:8000/api/login
<img width="367" alt="2- Login" src="https://user-images.githubusercontent.com/122753448/236270547-f83696ba-2df2-494e-b301-33d3254b2434.png">


    - LOGOUT
            POST  http://127.0.0.1:8000/api/logout
<img width="602" alt="6- Logout" src="https://user-images.githubusercontent.com/122753448/236270600-477d7d8e-931a-4a70-aad9-315a108f3cc9.png">

    
    - UPDATE PASSWORD
            PUT  http://127.0.0.1:8000/api/updatelogin
<img width="365" alt="5- Update Password" src="https://user-images.githubusercontent.com/122753448/236277717-0614fdf1-0989-405a-b4f2-b2a0d0a74acc.png">

    
    - UPDATE/CREATE PROFILE
            PUT http://127.0.0.1:8000/api/profile/update
![3-profile](https://user-images.githubusercontent.com/122753448/236277097-55844767-d28e-48a4-9217-b0a3b038ddde.gif)


    - GET MY PROFILE
            GET http://127.0.0.1:8000/api/profile
<img width="305" alt="4- Get My Profile" src="https://user-images.githubusercontent.com/122753448/236277125-444df77d-600c-4e97-bc67-b6101656617a.png">


    - GET ALL USERS AS ADMIN
            GET http://127.0.0.1:8000/api/users/all
<img width="575" alt="7- Get All Users" src="https://user-images.githubusercontent.com/122753448/236277380-8d4c663d-d015-4cb2-b139-1a60238548ff.png">


    - GET USERS DETAILS AS ADMIN
            GET http://127.0.0.1:8000/api/users/all/details/2
<img width="599" alt="8- Get User Details ID" src="https://user-images.githubusercontent.com/122753448/236281407-558744ae-40f9-44cd-a288-641437e5e42d.png">

            
    - DELETE USERS AS ADMIN
            DELETE http://127.0.0.1:8000/api/users/all/destroy/2
<img width="560" alt="9- Delete User" src="https://user-images.githubusercontent.com/122753448/236281455-26400796-2e42-4a36-bf95-5a8ebc55eecc.png">

            
    - CHANGE USERS ROLE
            PUT http://127.0.0.1:8000/api/user/role/update
<img width="375" alt="10- Update Role" src="https://user-images.githubusercontent.com/122753448/236281513-a40aca39-fb77-433b-b76d-9481537a85ec.png">

            
    - NEW GAME AS ADMIN
            POST http://127.0.0.1:8000/api/game/new
<img width="527" alt="11- New Game Admin" src="https://user-images.githubusercontent.com/122753448/236282117-83b9529b-5b8a-4da4-ae3d-3230a7d54966.png">

            
     - UPDATE GAME AS ADMIN
            PUT http://127.0.0.1:8000/api/game/update/77
<img width="532" alt="12- Update Game Admin" src="https://user-images.githubusercontent.com/122753448/236282136-6ea95264-67e7-4918-af48-2bdc67f1965c.png">

            
    - GET ALL GAMES WHITOUT REVIEW AS USER
            GET http://127.0.0.1:8000/api/games/all/user
<img width="604" alt="13- Get All Games without Review" src="https://user-images.githubusercontent.com/122753448/236281562-f859159c-e72b-466a-a937-593e6e0ff781.png">


    - GET ALL GAMES AS USER
            GET http://127.0.0.1:8000/api/games/all
<img width="632" alt="14- Get All Games User" src="https://user-images.githubusercontent.com/122753448/236282243-148bfa4d-ef42-404a-8d4f-eb95713a90ee.png">

            
    - GET ALL GAMES WITHOUT TOKEN
            GET http://127.0.0.1:8000/api/games/alls/nonuser
 <img width="612" alt="15- Get All Games No Token" src="https://user-images.githubusercontent.com/122753448/236282337-6e9e3561-0f51-4abb-9a84-94343cccdce2.png">

            
    - SEARCH GAMES WITH FILTER
            POST http://127.0.0.1:8000/api/games/find/
![16 FILTER](https://user-images.githubusercontent.com/122753448/236282543-397b6055-5ab3-421b-8c16-10f4c15b2ed3.gif)

            
     - GET GAME BY ID
            GET http://127.0.0.1:8000/api/games/all/24
<img width="686" alt="17- Get Games By ID" src="https://user-images.githubusercontent.com/122753448/236283687-8a9ff4c9-ddc5-45af-9213-19143ea09afd.png">

            
    - NEW REVIEW/UPDATE REVIEW AS USER
            POST http://127.0.0.1:8000/api/review/new
<img width="437" alt="19- New Review" src="https://user-images.githubusercontent.com/122753448/236283718-c929c53b-260b-4ab5-baf4-8c5113fafc7f.png">
            
            
     - GET MY REVIEWS AS USER
            GET http://127.0.0.1:8000/api/review/myreviews
<img width="668" alt="26- Get My Reviews" src="https://user-images.githubusercontent.com/122753448/236283787-020060a1-1591-4b6c-b6cf-6b85c806ea50.png">

            
    - GET MY REVIEWS WHITOUT FAVOURITES
            GET http://127.0.0.1:8000/api/review/favourites/not
<img width="490" alt="20- Get less favouritespng" src="https://user-images.githubusercontent.com/122753448/236283861-fd94fa24-dad0-4ee2-bc0e-3994d7f3b7c1.png">

    - GET MY REVIEWS WITH FAVOURITES
            GET http://127.0.0.1:8000/api/review/favourites/
<img width="498" alt="21- Get most favourites" src="https://user-images.githubusercontent.com/122753448/236284693-4b22aef3-f22f-4f60-bcda-a573e5e3d714.png">

            
    - DELETE YOUR REVIEW AS USER
            DELETE http://127.0.0.1:8000/api/review/15
![27DELETE](https://user-images.githubusercontent.com/122753448/236285046-1711dbe0-e0d2-47a7-9ea7-a4adc970b8d5.gif)

            
     - DELETE REVIEWS BY ID AS ADMIN
            DELETE http://127.0.0.1:8000/api/review/all/14
<img width="526" alt="28-Delete Reviews By Id Admin" src="https://user-images.githubusercontent.com/122753448/236285064-5430cf50-4761-4c55-ade1-62546a071053.png">

            
    - GET ALL REVIEWS AS ADMIN
            GET http://127.0.0.1:8000/api/reviews/all
<img width="595" alt="29- Get All Reviews" src="https://user-images.githubusercontent.com/122753448/236285087-da7fc8a6-120e-46c9-85f2-c81eccda57e0.png">

           
    - NEW NEWS AS ADMIN
            POST http://127.0.0.1:8000/api/news/new
<img width="431" alt="22-  New News Admin" src="https://user-images.githubusercontent.com/122753448/236285839-6f52c96b-5658-4628-8c50-03d9de618c46.png">


     - UPDATE NEWS BY ID AS ADMIN
            PUT http://127.0.0.1:8000/api/news/update/2
<img width="479" alt="25- Update News ID" src="https://user-images.githubusercontent.com/122753448/236285886-a507e95b-2802-43c1-b780-58bbcb561bbe.png">

            
    - DELETE NEWS BY ID AS ADMIN
            DELETE http://127.0.0.1:8000/api/news/all/destroy/1
<img width="488" alt="24-  Delete News By ID" src="https://user-images.githubusercontent.com/122753448/236285899-533244bc-f641-44eb-ac74-134a7712eab6.png">

           
    - GET ALL NEWS
            GET http://127.0.0.1:8000/api/news/all/
<img width="688" alt="23-  Get All News" src="https://user-images.githubusercontent.com/122753448/236285940-c42f82e2-8923-4a7d-8837-2bfe2ad816c1.png">

               
           
</details>

## Known bugs:

<p>There are a few GIFs in the readme with improvements that can be made.</p>
<p>The factories (News and Profile) work most of the time but sometimes fail to seed correctly and need to be refreshed.</p>
<p>There are a few messages that could be improved with more description.</p>
<p>There may be other issues to address, but good luck and have fun to all!</p>


## Licence

This project it's under licence of Álvaro Bernabé Alonso, you are free to do whatever You feel like with it.

## Development
You are Free to send me suggestion to improve the project, i always appreciate that.
``` js
 thisApp.belongsTo.Alvaro

 Developed by: alvarito10109
```  


## Thanks:
Thanks to all my colleagues who are charming and wonderful people and the teachers´s:

- *Dani*  
<a href="https://github.com/datata" target="_blank"><img src="https://img.shields.io/badge/github-24292F?style=for-the-badge&logo=github&logoColor=white" target="_blank"></a> 

- *Jose*  
<a href="https://github.com/Dave86dev" target="_blank"><img src="https://img.shields.io/badge/github-24292F?style=for-the-badge&logo=github&logoColor=white" target="_blank"></a> 

- *David*  
<a href="https://www.github.com/userGithub/" target="_blank"><img src="https://img.shields.io/badge/github-24292F?style=for-the-badge&logo=github&logoColor=red" target="_blank"></a>

- *Mara*  
<a href="https://www.github.com/userGithub/" target="_blank"><img src="https://img.shields.io/badge/github-24292F?style=for-the-badge&logo=github&logoColor=green" target="_blank"></a> 


## Contact
You can find me:
<a href = "mailto:alvaro101093@gmail.com"><img src="https://img.shields.io/badge/Gmail-C6362C?style=for-the-badge&logo=gmail&logoColor=white" target="_blank"></a>
<a href="https://www.linkedin.com/in/álvaro-bernabé-alonso-6514a999/" target="_blank"><img src="https://img.shields.io/badge/-LinkedIn-%230077B5?style=for-the-badge&logo=linkedin&logoColor=white" target="_blank"></a>

</p>
