<?php
// =============================================
//  CONFIG - Mets ta clé API TMDB ici
// =============================================
$API_KEY = "ed0397e1ec0e81df2f26767617da5500"; // https://www.themoviedb.org/settings/api
$BASE_URL = "https://api.themoviedb.org/3";
$IMG_URL  = "https://image.tmdb.org/t/p/w300";

// =============================================
//  FONCTIONS
// =============================================

// Appel générique à l'API TMDB
function tmdb_get($endpoint, $params = []) {
    global $API_KEY, $BASE_URL;
    $params['api_key']  = $API_KEY;
    $params['language'] = 'fr-FR';
    $url = $BASE_URL . $endpoint . '?' . http_build_query($params);
    $response = file_get_contents($url);
    return json_decode($response, true);
}

// =============================================
//  LOGIQUE : recherche ou films populaires
// =============================================
$recherche = isset($_GET['q']) ? trim($_GET['q']) : '';
$page      = isset($_GET['page']) ? (int)$_GET['page'] : 1;

if ($recherche !== '') {
    $data   = tmdb_get('/search/movie', ['query' => $recherche, 'page' => $page]);
    $titre  = "Résultats pour : \"$recherche\"";
} else {
    $data   = tmdb_get('/movie/popular', ['page' => $page]);
    $titre  = "Films populaires";
}

$films       = $data['results']    ?? [];
$total_pages = min($data['total_pages'] ?? 1, 500); // TMDB limite à 500 pages

// Détail d'un film si on clique dessus
$film_detail = null;
if (isset($_GET['id'])) {
    $film_detail = tmdb_get('/movie/' . (int)$_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🎬 CinéSearch</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #0d0d0d;
            color: #f0f0f0;
            min-height: 100vh;
        }

        /* HEADER */
        header {
            background: linear-gradient(135deg, #1a1a2e, #16213e);
            padding: 30px 20px;
            text-align: center;
            border-bottom: 2px solid #e94560;
        }
        header h1 { font-size: 2.5rem; color: #e94560; margin-bottom: 5px; }
        header p  { color: #888; font-size: 0.9rem; }

        /* BARRE DE RECHERCHE */
        .search-bar {
            display: flex;
            justify-content: center;
            padding: 25px 20px 10px;
            gap: 10px;
        }
        .search-bar input {
            width: 100%;
            max-width: 500px;
            padding: 12px 18px;
            border-radius: 30px;
            border: 2px solid #333;
            background: #1a1a1a;
            color: #fff;
            font-size: 1rem;
            outline: none;
            transition: border-color 0.3s;
        }
        .search-bar input:focus { border-color: #e94560; }
        .search-bar button {
            padding: 12px 24px;
            background: #e94560;
            color: white;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-size: 1rem;
            transition: background 0.3s;
        }
        .search-bar button:hover { background: #c73652; }

        /* TITRE SECTION */
        .section-title {
            text-align: center;
            margin: 20px 0 10px;
            font-size: 1.3rem;
            color: #aaa;
        }

        /* GRILLE DE FILMS */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 20px;
            padding: 20px 30px;
            max-width: 1300px;
            margin: 0 auto;
        }

        .card {
            background: #1a1a1a;
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
            display: block;
        }
        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 30px rgba(233, 69, 96, 0.3);
        }
        .card img {
            width: 100%;
            height: 270px;
            object-fit: cover;
            display: block;
        }
        .card .no-img {
            width: 100%;
            height: 270px;
            background: #2a2a2a;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
        }
        .card-info {
            padding: 12px;
        }
        .card-info h3 {
            font-size: 0.95rem;
            margin-bottom: 5px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .card-info .note {
            color: #f5c518;
            font-size: 0.85rem;
        }
        .card-info .annee {
            color: #888;
            font-size: 0.8rem;
        }

        /* PAGINATION */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
            padding: 30px;
            flex-wrap: wrap;
        }
        .pagination a, .pagination span {
            padding: 8px 18px;
            border-radius: 20px;
            background: #1a1a1a;
            color: #f0f0f0;
            text-decoration: none;
            border: 1px solid #333;
            transition: background 0.2s;
        }
        .pagination a:hover  { background: #e94560; border-color: #e94560; }
        .pagination .current { background: #e94560; border-color: #e94560; }
        .pagination .disabled { color: #555; cursor: default; }

        /* MODAL DETAIL */
        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.85);
            z-index: 100;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .modal-overlay.active { display: flex; }
        .modal {
            background: #1a1a2e;
            border-radius: 16px;
            max-width: 700px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            padding: 30px;
            border: 1px solid #e94560;
        }
        .modal-close {
            position: absolute;
            top: 15px; right: 20px;
            font-size: 1.5rem;
            cursor: pointer;
            color: #e94560;
            background: none;
            border: none;
        }
        .modal-top {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }
        .modal-top img {
            width: 150px;
            border-radius: 10px;
            flex-shrink: 0;
        }
        .modal-top .no-img {
            width: 150px;
            height: 225px;
            background: #2a2a2a;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            flex-shrink: 0;
        }
        .modal-top h2 { font-size: 1.5rem; margin-bottom: 8px; color: #e94560; }
        .modal-top .meta { color: #aaa; font-size: 0.9rem; margin-bottom: 10px; }
        .modal-top .note { color: #f5c518; font-size: 1rem; }
        .modal p.synopsis { line-height: 1.7; color: #ccc; }

        /* MESSAGE VIDE */
        .vide { text-align: center; padding: 60px; color: #555; font-size: 1.1rem; }
    </style>
</head>
<body>

<header>
    <h1>🎬 CinéSearch</h1>
    <p>Propulsé par l'API TMDB</p>
</header>

<!-- BARRE DE RECHERCHE -->
<form class="search-bar" method="GET" action="">
    <input type="text" name="q" placeholder="Rechercher un film..." value="<?= htmlspecialchars($recherche) ?>">
    <button type="submit">🔍 Rechercher</button>
</form>

<p class="section-title"><?= htmlspecialchars($titre) ?> (page <?= $page ?>/<?= $total_pages ?>)</p>

<!-- GRILLE DE FILMS -->
<?php if (empty($films)): ?>
    <div class="vide">😕 Aucun film trouvé.</div>
<?php else: ?>
<div class="grid">
    <?php foreach ($films as $film): 

        $poster = $film['poster_path'] ? $IMG_URL . $film['poster_path'] : null;
        $annee  = isset($film['release_date']) ? substr($film['release_date'], 0, 4) : '?';
        $note   = number_format($film['vote_average'] ?? 0, 1);
        $url    = '?id=' . $film['id'] . ($recherche ? '&q=' . urlencode($recherche) : '') . '&page=' . $page;
    ?>
    <a class="card" href="<?= $url ?>">
        <?php if ($poster): ?>
            <img src="<?= $poster ?>" alt="<?= htmlspecialchars($film['title']) ?>">
        <?php else: ?>
            <div class="no-img">🎥</div>
        <?php endif; ?>
        <div class="card-info">
            <h3><?= htmlspecialchars($film['title']) ?></h3>
            <div class="note">⭐ <?= $note ?></div>
            <div class="annee">📅 <?= $annee ?></div>
        </div>
    </a>
    <?php endforeach; ?>
</div>
<?php endif; ?>

<!-- PAGINATION -->
<div class="pagination">
    <?php if ($page > 1): ?>
        <a href="?q=<?= urlencode($recherche) ?>&page=<?= $page - 1 ?>">← Précédent</a>
    <?php else: ?>
        <span class="disabled">← Précédent</span>
    <?php endif; ?>

    <span class="current">Page <?= $page ?></span>

    <?php if ($page < $total_pages): ?>
        <a href="?q=<?= urlencode($recherche) ?>&page=<?= $page + 1 ?>">Suivant →</a>
    <?php else: ?>
        <span class="disabled">Suivant →</span>
    <?php endif; ?>
</div>

<!-- MODAL DETAIL -->
<?php if ($film_detail): ?>
<div class="modal-overlay active" id="modal">
    <div class="modal">
        <button class="modal-close" onclick="document.getElementById('modal').classList.remove('active')">✕</button>
        <?php
            $poster = $film_detail['poster_path'] ? $IMG_URL . $film_detail['poster_path'] : null;
            $annee  = substr($film_detail['release_date'] ?? '????', 0, 4);
            $note   = number_format($film_detail['vote_average'] ?? 0, 1);
            $duree  = $film_detail['runtime'] ? $film_detail['runtime'] . ' min' : 'N/A';
            $genres = implode(', ', array_column($film_detail['genres'] ?? [], 'name'));
        ?>
        <div class="modal-top">
            <?php if ($poster): ?>
                <img src="<?= $poster ?>" alt="Affiche">
            <?php else: ?>
                <div class="no-img">🎥</div>
            <?php endif; ?>
            <div>
                <h2><?= htmlspecialchars($film_detail['title']) ?></h2>
                <div class="meta">
                    📅 <?= $annee ?> &nbsp;|&nbsp;
                    ⏱ <?= $duree ?> &nbsp;|&nbsp;
                    🎭 <?= htmlspecialchars($genres) ?>
                </div>
                <div class="note">⭐ <?= $note ?>/10 (<?= number_format($film_detail['vote_count'] ?? 0) ?> votes)</div>
                <br>
                <form action="">
                    <div style="display: flex; justify-content: space-between">
                        <select name="pets" id="pet-select">
                            <option value="">--Choisir un genre personnailisé--</option>
                            <option value="dog">Chien</option>
                            <option value="cat">Chat</option>
                        </select>
                        <div>
                            <div>
                                <input type="radio" id="huey" name="drone" value="huey" checked />
                                <label for="huey">🕒</label>
                            </div>
                            <div>
                                <input type="radio" id="dewey" name="drone" value="dewey" />
                                <label for="dewey">👁️</label>
                            </div>
                        </div>



                    </div>
                    
                    
                    
                    <br><br>
                        <textarea name="" id="" placeholder="Entrer une mote personnailisée" cols="60" rows="10"></textarea>
                </form>
            </div>
        </div>
        <p class="synopsis"><?= htmlspecialchars($film_detail['overview'] ?? 'Aucun synopsis disponible.') ?></p>
    </div>
</div>
<?php endif; ?>

</body>
</html>