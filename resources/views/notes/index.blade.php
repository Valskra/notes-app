@extends('layouts.app')

@section('content')


<div class="container">
    <div class="header">
        <h1 style="color: #667eea">✨ Mes Notes</h1>
        <a href="#" class="create-btn">
            <svg class="icon" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                    clip-rule="evenodd"></path>
            </svg>
            Créer une nouvelle note
        </a>
    </div>

    <div class="success-alert" style="display: none;" id="successAlert">
        Note créée avec succès !
    </div>

    <div class="search-section">
        <form class="search-form">
            <input type="text" class="search-input" placeholder="🔍 Rechercher vos notes..." name="search">
            <select class="sort-select" name="sort">
                <option value="">📊 Trier par</option>
                <option value="title">📝 Titre</option>
                <option value="created_at">📅 Date de création</option>
            </select>
            <button type="submit" class="filter-btn">Filtrer</button>
        </form>
    </div>

    <div class="notes-grid">
        <div class="note-card">
            <h3 class="note-title">Guide de développement Laravel</h3>
            <p class="note-content">
                Dans ce guide, nous explorons les meilleures pratiques pour développer des applications Laravel
                modernes et performantes. Nous couvrons l'architecture MVC, les migrations...
            </p>
            <div class="note-actions">
                <a href="#" class="btn btn-view">
                    <svg class="icon" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                        <path fill-rule="evenodd"
                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Voir
                </a>
                <a href="#" class="btn btn-edit">
                    <svg class="icon" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                        </path>
                    </svg>
                    Modifier
                </a>
                <form class="delete-form" onsubmit="return confirm('Supprimer cette note ?')">
                    <button type="submit" class="btn btn-delete">
                        <svg class="icon" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Supprimer
                    </button>
                </form>
            </div>
        </div>

        <div class="note-card">
            <h3 class="note-title">Recettes de cuisine française</h3>
            <p class="note-content">
                Collection de recettes traditionnelles françaises avec des techniques modernes. Inclut les plats
                classiques comme le coq au vin, la bouillabaisse, et les desserts...
            </p>
            <div class="note-actions">
                <a href="#" class="btn btn-view">
                    <svg class="icon" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                        <path fill-rule="evenodd"
                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Voir
                </a>
                <a href="#" class="btn btn-edit">
                    <svg class="icon" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                        </path>
                    </svg>
                    Modifier
                </a>
                <form class="delete-form" onsubmit="return confirm('Supprimer cette note ?')">
                    <button type="submit" class="btn btn-delete">
                        <svg class="icon" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Supprimer
                    </button>
                </form>
            </div>
        </div>

        <div class="note-card">
            <h3 class="note-title">Idées de voyage 2024</h3>
            <p class="note-content">
                Liste des destinations à explorer cette année : Japon pour les cerisiers en fleur, Islande pour les
                aurores boréales, Patagonie pour la randonnée...
            </p>
            <div class="note-actions">
                <a href="#" class="btn btn-view">
                    <svg class="icon" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                        <path fill-rule="evenodd"
                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Voir
                </a>
                <a href="#" class="btn btn-edit">
                    <svg class="icon" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                        </path>
                    </svg>
                    Modifier
                </a>
                <form class="delete-form" onsubmit="return confirm('Supprimer cette note ?')">
                    <button type="submit" class="btn btn-delete">
                        <svg class="icon" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Supprimer
                    </button>
                </form>
            </div>
        </div>

        <div class="note-card">
            <h3 class="note-title">Notes de réunion - Projet Alpha</h3>
            <p class="note-content">
                Résumé de la réunion du 15 mai concernant le projet Alpha. Points clés : budget approuvé, équipe
                constituée, timeline définie pour 6 mois...
            </p>
            <div class="note-actions">
                <a href="#" class="btn btn-view">
                    <svg class="icon" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                        <path fill-rule="evenodd"
                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Voir
                </a>
                <a href="#" class="btn btn-edit">
                    <svg class="icon" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                        </path>
                    </svg>
                    Modifier
                </a>
                <form class="delete-form" onsubmit="return confirm('Supprimer cette note ?')">
                    <button type="submit" class="btn btn-delete">
                        <svg class="icon" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Supprimer
                    </button>
                </form>
            </div>
        </div>

        <div class="note-card">
            <h3 class="note-title">Liste de lecture - Livres inspirants</h3>
            <p class="note-content">
                Sélection de livres à lire absolument : "Sapiens" de Yuval Noah Harari, "Atomic Habits" de James
                Clear, "The Lean Startup" d'Eric Ries...
            </p>
            <div class="note-actions">
                <a href="#" class="btn btn-view">
                    <svg class="icon" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                        <path fill-rule="evenodd"
                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Voir
                </a>
                <a href="#" class="btn btn-edit">
                    <svg class="icon" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                        </path>
                    </svg>
                    Modifier
                </a>
                <form class="delete-form" onsubmit="return confirm('Supprimer cette note ?')">
                    <button type="submit" class="btn btn-delete">
                        <svg class="icon" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        color: #2d3748;
        line-height: 1.6;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
    }

    .header {
        text-align: center;
        margin-bottom: 3rem;
        padding: 2rem 0;
    }

    .header h1 {
        font-size: 3rem;
        font-weight: 800;
        color: white;
        margin-bottom: 1rem;
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        animation: fadeInUp 0.8s ease-out;
    }

    .create-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: linear-gradient(135deg, #ff6b6b, #ff8e8e);
        color: white;
        padding: 1rem 2rem;
        border: none;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(255, 107, 107, 0.3);
        animation: fadeInUp 0.8s ease-out 0.2s both;
    }

    .create-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(255, 107, 107, 0.4);
        color: white;
        text-decoration: none;
    }

    .success-alert {
        background: linear-gradient(135deg, #4ecdc4, #44a08d);
        color: white;
        padding: 1rem 2rem;
        border-radius: 15px;
        margin-bottom: 2rem;
        text-align: center;
        font-weight: 500;
        box-shadow: 0 8px 25px rgba(78, 205, 196, 0.3);
        animation: slideInDown 0.5s ease-out;
    }

    .search-section {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 3rem;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        animation: fadeInUp 0.8s ease-out 0.4s both;
    }

    .search-form {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        align-items: center;
    }

    .search-input,
    .sort-select {
        flex: 1;
        min-width: 200px;
        padding: 0.8rem 1.2rem;
        border: 2px solid rgba(102, 126, 234, 0.1);
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: white;
    }

    .search-input:focus,
    .sort-select:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .filter-btn {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 0.8rem 2rem;
        border: none;
        border-radius: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .filter-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
    }

    .notes-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 2rem;
        animation: fadeInUp 0.8s ease-out 0.6s both;
    }

    .note-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        padding: 2rem;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
    }

    .note-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, #ff6b6b, #667eea, #4ecdc4);
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .note-card:hover::before {
        transform: scaleX(1);
    }

    .note-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    }

    .note-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 1rem;
        line-height: 1.3;
    }

    .note-content {
        color: #718096;
        margin-bottom: 2rem;
        font-size: 1rem;
        line-height: 1.6;
    }

    .note-actions {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
    }

    .btn {
        padding: 0.6rem 1.2rem;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
    }

    .btn-view {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
    }

    .btn-edit {
        background: linear-gradient(135deg, #ffeaa7, #fab1a0);
        color: #2d3748;
    }

    .btn-delete {
        background: linear-gradient(135deg, #ff7675, #fd79a8);
        color: white;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .delete-form {
        display: inline;
    }

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

    @keyframes slideInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 768px) {
        .container {
            padding: 1rem;
        }

        .header h1 {
            font-size: 2rem;
        }

        .notes-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .search-form {
            flex-direction: column;
        }

        .search-input,
        .sort-select {
            min-width: 100%;
        }
    }

    .icon {
        width: 16px;
        height: 16px;
    }
</style>

<script>
    // Animation au scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationDelay = '0s';
                    entry.target.style.animationFillMode = 'both';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.note-card').forEach(card => {
            observer.observe(card);
        });

        // Effet de recherche en temps réel (simulation)
        const searchInput = document.querySelector('.search-input');
        searchInput.addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            document.querySelectorAll('.note-card').forEach(card => {
                const title = card.querySelector('.note-title').textContent.toLowerCase();
                const content = card.querySelector('.note-content').textContent.toLowerCase();
                
                if (title.includes(searchTerm) || content.includes(searchTerm)) {
                    card.style.display = 'block';
                    card.style.animation = 'fadeInUp 0.5s ease-out';
                } else {
                    card.style.display = 'none';
                }
            });
        });
</script>
@endsection