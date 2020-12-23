<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Connexion</h1>
                  </div>
                  <?= $this->form->create() ?>
                    <div class="form-group">
                      <input name="username" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Identifiant">
                    </div>
                    <div class="form-group">
                      <input name="password" type="password" class="form-control form-control-user" placeholder="Mot de passe">
                    </div>
                    <?= $this->form->submit('Connexion', ['class' => "btn btn-primary btn-user btn-block"]) ?>
                  <?= $this->form->end() ?>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      </div>
