<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
    
                <li class="nav-item">
                    <a class="nav-link" href="/article">articles</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/commentaire">commentaires</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/contact">contacts</a>
                  </li>
              
                  <li class="nav-item">
                    <a class="nav-link" href="/backtestimonials">testimonials</a>
                  </li>
                  
                  
                 
            </ul>
            <x-app-layout>
                <x-slot name="header">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Dashboard') }}
                    </h2>
                </x-slot>
            </x-app-layout>
                
                
           
          </div>
        </div>
      </nav>