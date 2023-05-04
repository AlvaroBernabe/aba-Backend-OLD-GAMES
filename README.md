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
<p>My project consists of creating a library of Abandonware or Freeware games that companies no longer sell, with which the user, once he logs in, can search the catalog of games available under such a term as well as add favorites and see different aspects of each one.</p>
<p>Something like Steam but with games that the companies have abandoned.</p>
<p>The technologies that I will use for the Backend PHP with Laravel, and for the Front HTML, CSS, React Vite, Bootstrap and Redux.</p>
Trough this API you can manage the next Endpoints:

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
[Final Proyect Back.postman_collection.zip](https://github.com/AlvaroBernabe/aba-geekshubs-fsd-val-Backend-Final-Proyect/files/11398928/Final.Proyect.Back.postman_collection.zip)



1. Clone repository in terminal or bash / or download manually the repo.
git clone https://github.com/AlvaroBernabe/-aba-geekshubs-fsd-val-Project6---Laravel.git
2. Install dependencies.
composer install
3. Connect repo with database, through env file.
Rename the .env.example to .env and configure the env file to match your Docker config.
4. ``` $ Execute migrations ``` 
php artisan migrate
5. ``` $ Execute seeders ``` 
php artisan db:seed
6. ``` $ php artisan serve ``` 
7. You are ready to play with Docker or Thunder Client.

## Endpoints
<details>
<summary>Endpoints</summary>


    - WELCOME
            GET http://127.0.0.1:8000/api/welcome
 ![1-Welcome](https://user-images.githubusercontent.com/122753448/231732749-4e953af9-eb04-4899-b37e-464d4e93d585.png)


    - REGISTER
            POST http://127.0.0.1:8000/api/register
<img width="361" alt="2- Register User" src="https://user-images.githubusercontent.com/122753448/231733129-c6231cb0-7051-4024-9e9e-0f52e97c006c.png">


    - LOGIN
            POST http://127.0.0.1:8000/api/login
<img width="340" alt="3- Login User" src="https://user-images.githubusercontent.com/122753448/231733512-74317628-4665-438e-a442-5f0bf0ffe2d5.png">


    - UPDATE PROFILE
            PUT http://127.0.0.1:8000/api/profile/update
<img width="314" alt="4-Update Profile" src="https://user-images.githubusercontent.com/122753448/231733701-80a739ee-c13e-452e-ad0f-ca0a8c5db889.png">


    - GET MY PROFILE
            GET http://127.0.0.1:8000/api/profile
<img width="582" alt="5- Get My Profile" src="https://user-images.githubusercontent.com/122753448/231733990-17be1bf1-8a8f-4aad-bb64-9548171f4bca.png">


    - LOGOUT
            POST  http://127.0.0.1:8000/api/logout
<img width="592" alt="6 - Logout" src="https://user-images.githubusercontent.com/122753448/231734231-7d595769-d7e2-4152-8f1d-55f9b775571f.png">


    - CREATE MESSAGE
            POST  http://127.0.0.1:8000/api/comments/create
<img width="414" alt="7- Create Message" src="https://user-images.githubusercontent.com/122753448/231734321-2220e4f7-583c-47da-9d8a-7c9cf448bfab.png">


    - SEE OWN MESSAGE
            GET  http://127.0.0.1:8000/api/mycomments/view
<img width="605" alt="8- Get My Message" src="https://user-images.githubusercontent.com/122753448/231738158-90f43283-81e2-49f6-bbb9-9549cd162f3f.png">


 


</details>

## Known bugs:

<p> - There are a few gif in the readme with improvement to be made.</p>
<p> - Factorys (News and Profile) works most of the time but sometimes they fail to seed correctly and need to refresh.</p>
<p> - There is probably more but Good Luck Have Fun to All :)</p>


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
