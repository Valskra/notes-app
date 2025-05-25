@extends('layouts.app')

@section('content')
<div class="min-vh-100 bg-gradient-to-br from-amber-50 to-orange-100 py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">

                <!-- Header avec animation -->
                <div class="text-center mb-5">
                    <div class="d-inline-flex align-items-center justify-content-center bg-warning rounded-circle mb-3"
                        style="width: 80px; height: 80px; animation: fadeInUp 0.6s ease-out;">
                        <i class="bi bi-pencil-square text-white" style="font-size: 2rem;"></i>
                    </div>
                    <h1 class="display-5 fw-bold text-warning-emphasis mb-2"
                        style="animation: fadeInUp 0.6s ease-out 0.2s both;">
                        Modifier la Note
                    </h1>
                    <p class="text-muted lead" style="animation: fadeInUp 0.6s ease-out 0.4s both;">
                        Peaufinez et améliorez votre contenu
                    </p>
                </div>

                <!-- Carte principale avec glassmorphism -->
                <div class="card border-0 shadow-lg position-relative overflow-hidden"
                    style="backdrop-filter: blur(20px); background: rgba(255, 255, 255, 0.95); animation: slideInUp 0.8s ease-out 0.3s both;">

                    <!-- Accent décoratif -->
                    <div class="position-absolute top-0 start-0 w-100 bg-gradient-to-r from-warning to-orange-400"
                        style="height: 4px;"></div>

                    <div class="card-body p-5">

                        <!-- Informations sur la note -->
                        <div class="bg-light rounded-3 p-3 mb-4 border-start border-warning border-4">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-info-circle text-warning me-2"></i>
                                <small class="text-muted">
                                    Note créée le {{ $note->created_at->format('d/m/Y à H:i') }}
                                    @if($note->updated_at != $note->created_at)
                                    • Dernière modification le {{ $note->updated_at->format('d/m/Y à H:i') }}
                                    @endif
                                </small>
                            </div>
                        </div>

                        <form action="{{ route('notes.update', $note) }}" method="POST" class="needs-validation"
                            novalidate>
                            @csrf
                            @method('PUT')

                            <!-- Champ Titre -->
                            <div class="mb-4 position-relative">
                                <label for="title" class="form-label fw-semibold text-dark mb-2">
                                    <i class="bi bi-type text-warning me-2"></i>Titre de la note
                                </label>
                                <input type="text" name="title" id="title"
                                    class="form-control form-control-lg border-0 shadow-sm rounded-3 px-4 py-3"
                                    style="background: #fffbeb; transition: all 0.3s ease; border: 2px solid transparent !important;"
                                    value="{{ old('title', $note->title) }}" required>
                                <div class="invalid-feedback">
                                    Veuillez saisir un titre pour votre note.
                                </div>
                            </div>

                            <!-- Champ Contenu -->
                            <div class="mb-5 position-relative">
                                <label for="content" class="form-label fw-semibold text-dark mb-2">
                                    <i class="bi bi-file-text text-warning me-2"></i>Contenu
                                </label>
                                <textarea name="content" id="content"
                                    class="form-control border-0 shadow-sm rounded-3 px-4 py-3" rows="10"
                                    style="background: #fffbeb; transition: all 0.3s ease; border: 2px solid transparent !important; resize: vertical; min-height: 250px;"
                                    required>{{ old('content', $note->content) }}</textarea>
                                <div class="invalid-feedback">
                                    Veuillez saisir le contenu de votre note.
                                </div>

                                <!-- Compteur de caractères -->
                                <div class="d-flex justify-content-between mt-2">
                                    <small class="text-muted">
                                        <i class="bi bi-info-circle me-1"></i>
                                        Les modifications sont automatiquement sauvegardées
                                    </small>
                                    <small class="text-muted">
                                        <span id="charCount">0</span> caractères
                                    </small>
                                </div>
                            </div>

                            <!-- Prévisualisation (optionnelle) -->
                            <div class="mb-4">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="fw-semibold text-dark">
                                        <i class="bi bi-eye text-warning me-2"></i>Aperçu
                                    </span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary" id="togglePreview">
                                        <i class="bi bi-eye-slash"></i> Masquer
                                    </button>
                                </div>
                                <div id="preview" class="bg-light rounded-3 p-3 border" style="min-height: 100px;">
                                    <!-- Le contenu sera injecté ici -->
                                </div>
                            </div>

                            <!-- Boutons d'action -->
                            <div class="d-flex flex-column flex-sm-row gap-3 justify-content-between">
                                <div class="d-flex gap-2">
                                    <a href="{{ route('notes.show', $note) }}"
                                        class="btn btn-outline-info btn-lg rounded-pill px-4 py-3 d-flex align-items-center justify-content-center"
                                        style="transition: all 0.3s ease;">
                                        <i class="bi bi-eye me-2"></i>
                                        Voir
                                    </a>

                                    <a href="{{ route('notes.index') }}"
                                        class="btn btn-outline-secondary btn-lg rounded-pill px-4 py-3 d-flex align-items-center justify-content-center"
                                        style="transition: all 0.3s ease;">
                                        <i class="bi bi-arrow-left me-2"></i>
                                        Retour
                                    </a>
                                </div>

                                <button type="submit"
                                    class="btn btn-warning btn-lg rounded-pill px-5 py-3 d-flex align-items-center justify-content-center position-relative overflow-hidden"
                                    style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); border: none; transition: all 0.3s ease; min-width: 180px; box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);"
                                    onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(245, 158, 11, 0.4)'"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(245, 158, 11, 0.3)'">
                                    <i class="bi bi-check-circle me-2"></i>
                                    Mettre à jour
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Raccourcis clavier -->
                <div class="text-center mt-4">
                    <small class="text-muted">
                        <i class="bi bi-keyboard me-1"></i>
                        Raccourcis: <kbd class="bg-light text-dark border rounded px-2 py-1">Ctrl + S</kbd> sauvegarder
                        •
                        <kbd class="bg-light text-dark border rounded px-2 py-1">Ctrl + P</kbd> aperçu
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

    .form-control:focus {
        background: white !important;
        border: 2px solid #f59e0b !important;
        box-shadow: 0 0 0 0.2rem rgba(245, 158, 11, 0.15) !important;
        transform: translateY(-1px);
    }

    .btn:focus {
        box-shadow: 0 0 0 0.2rem rgba(245, 158, 11, 0.25) !important;
    }

    #preview {
        white-space: pre-wrap;
        word-wrap: break-word;
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

// Compteur de caractères et aperçu en temps réel
const contentTextarea = document.getElementById('content');
const charCount = document.getElementById('charCount');
const preview = document.getElementById('preview');
const togglePreviewBtn = document.getElementById('togglePreview');

function updateCharCount() {
    charCount.textContent = contentTextarea.value.length;
}

function updatePreview() {
    const title = document.getElementById('title').value;
    const content = contentTextarea.value;
    
    preview.innerHTML = `
        <h5 class="text-primary mb-3">${title || 'Titre de la note'}</h5>
        <div>${content || 'Le contenu apparaîtra ici...'}</div>
    `;
}

contentTextarea.addEventListener('input', function() {
    updateCharCount();
    updatePreview();
    
    // Auto-resize
    this.style.height = 'auto';
    this.style.height = this.scrollHeight + 'px';
});

document.getElementById('title').addEventListener('input', updatePreview);

togglePreviewBtn.addEventListener('click', function() {
    const previewDiv = document.getElementById('preview');
    const icon = this.querySelector('i');
    
    if (previewDiv.style.display === 'none') {
        previewDiv.style.display = 'block';
        icon.className = 'bi bi-eye-slash';
        this.innerHTML = '<i class="bi bi-eye-slash"></i> Masquer';
    } else {
        previewDiv.style.display = 'none';
        icon.className = 'bi bi-eye';
        this.innerHTML = '<i class="bi bi-eye"></i> Afficher';
    }
});

// Raccourcis clavier
document.addEventListener('keydown', function(e) {
    if (e.ctrlKey && e.key === 's') {
        e.preventDefault();
        document.querySelector('form').submit();
    }
    if (e.ctrlKey && e.key === 'p') {
        e.preventDefault();
        togglePreviewBtn.click();
    }
});

// Initialisation
updateCharCount();
updatePreview();
</script>
@endsection