@extends('layouts.app')

@section('content')
<div class="min-vh-100 bg-gradient-to-br from-blue-50 to-indigo-100 py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">

                <!-- Header avec animation -->
                <div class="text-center mb-5">
                    <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle mb-3"
                        style="width: 80px; height: 80px; animation: fadeInUp 0.6s ease-out;">
                        <i class="bi bi-journal-plus text-white" style="font-size: 2rem;"></i>
                    </div>
                    <h1 class="display-5 fw-bold text-primary mb-2"
                        style="animation: fadeInUp 0.6s ease-out 0.2s both;">
                        Créer une Note
                    </h1>
                    <p class="text-muted lead" style="animation: fadeInUp 0.6s ease-out 0.4s both;">
                        Capturez vos idées et organisez vos pensées
                    </p>
                </div>

                <!-- Carte principale avec glassmorphism -->
                <div class="card border-0 shadow-lg position-relative overflow-hidden"
                    style="backdrop-filter: blur(20px); background: rgba(255, 255, 255, 0.9); animation: slideInUp 0.8s ease-out 0.3s both;">

                    <!-- Accent décoratif -->
                    <div class="position-absolute top-0 start-0 w-100 bg-gradient-to-r from-primary to-info"
                        style="height: 4px;"></div>

                    <div class="card-body p-5">

                        <!-- Messages d'erreur stylisés -->
                        @if ($errors->any())
                        <div class="alert alert-danger border-0 rounded-3 mb-4"
                            style="background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%); animation: shake 0.5s ease-in-out;">
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-exclamation-triangle-fill text-danger me-2"></i>
                                <strong>Attention !</strong>
                            </div>
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                <li class="text-danger-emphasis">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{ route('notes.store') }}" method="POST" class="needs-validation" novalidate>
                            @csrf

                            <!-- Champ Titre -->
                            <div class="mb-4 position-relative">
                                <label for="title" class="form-label fw-semibold text-dark mb-2">
                                    <i class="bi bi-type text-primary me-2"></i>Titre de la note
                                </label>
                                <input type="text" name="title" id="title"
                                    class="form-control form-control-lg border-0 shadow-sm rounded-3 px-4 py-3"
                                    style="background: #f8fafc; transition: all 0.3s ease; border: 2px solid transparent !important;"
                                    placeholder="Donnez un titre à votre note..." required
                                    onkeyup="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px'">
                                <div class="invalid-feedback">
                                    Veuillez saisir un titre pour votre note.
                                </div>
                            </div>

                            <!-- Champ Contenu -->
                            <div class="mb-5 position-relative">
                                <label for="content" class="form-label fw-semibold text-dark mb-2">
                                    <i class="bi bi-file-text text-primary me-2"></i>Contenu
                                </label>
                                <textarea name="content" id="content"
                                    class="form-control border-0 shadow-sm rounded-3 px-4 py-3" rows="8"
                                    style="background: #f8fafc; transition: all 0.3s ease; border: 2px solid transparent !important; resize: vertical; min-height: 200px;"
                                    placeholder="Écrivez le contenu de votre note ici..." required></textarea>
                                <div class="invalid-feedback">
                                    Veuillez saisir le contenu de votre note.
                                </div>
                                <small class="text-muted mt-2 d-block">
                                    <i class="bi bi-info-circle me-1"></i>
                                    Tip: Utilisez Markdown pour formater votre texte
                                </small>
                            </div>

                            <!-- Boutons d'action -->
                            <div class="d-flex flex-column flex-sm-row gap-3 justify-content-between">
                                <a href="{{ route('notes.index') }}"
                                    class="btn btn-outline-secondary btn-lg rounded-pill px-4 py-3 d-flex align-items-center justify-content-center"
                                    style="transition: all 0.3s ease; min-width: 140px;">
                                    <i class="bi bi-arrow-left me-2"></i>
                                    Annuler
                                </a>

                                <button type="submit"
                                    class="btn btn-primary btn-lg rounded-pill px-5 py-3 d-flex align-items-center justify-content-center position-relative overflow-hidden"
                                    style="background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); border: none; transition: all 0.3s ease; min-width: 160px; box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);"
                                    onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(59, 130, 246, 0.4)'"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(59, 130, 246, 0.3)'">
                                    <i class="bi bi-save me-2"></i>
                                    Enregistrer
                                    <span class="position-absolute top-0 start-0 w-100 h-100 bg-white opacity-0"
                                        style="transition: opacity 0.3s ease;"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Raccourcis clavier -->
                <div class="text-center mt-4">
                    <small class="text-muted">
                        <i class="bi bi-keyboard me-1"></i>
                        Raccourci: <kbd class="bg-light text-dark border rounded px-2 py-1">Ctrl + S</kbd> pour
                        sauvegarder
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(50px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes shake {

        0%,
        100% {
            transform: translateX(0);
        }

        25% {
            transform: translateX(-5px);
        }

        75% {
            transform: translateX(5px);
        }
    }

    .form-control:focus {
        background: white !important;
        border: 2px solid #3b82f6 !important;
        box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.15) !important;
        transform: translateY(-1px);
    }

    .btn:focus {
        box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.25) !important;
    }

    kbd {
        font-size: 0.75em;
    }
</style>

<script>
    // Validation du formulaire
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

// Raccourci clavier Ctrl+S
document.addEventListener('keydown', function(e) {
    if (e.ctrlKey && e.key === 's') {
        e.preventDefault();
        document.querySelector('form').submit();
    }
});

// Auto-resize pour le textarea
document.getElementById('content').addEventListener('input', function() {
    this.style.height = 'auto';
    this.style.height = this.scrollHeight + 'px';
});
</script>
@endsection