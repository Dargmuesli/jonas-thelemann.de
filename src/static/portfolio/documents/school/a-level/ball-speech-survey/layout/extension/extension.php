<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/database/pdo.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/filesystem/environment.php';

    load_env_file($_SERVER['SERVER_ROOT'].'/credentials');

    if (isset($_POST['chosen'])) {
        $open = false;

        if ($open) {
            $dbh = get_dbh($_ENV['PGSQL_DATABASE']);
            $stmt = $dbh->prepare('SELECT ip FROM alevelballspeech WHERE ip = :ip');
            $stmt->bindParam(':ip', $_SERVER['HTTP_X_REAL_IP']);

            if (!$stmt->execute()) {
                throw new PDOException($stmt->errorInfo()[2]);
            }

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row['chosenspeaker'] != $_POST['chosen']) {
                $stmt = $dbh->prepare('UPDATE alevelballspeech SET chosenspeaker = :chosenspeaker WHERE ip = :ip');
                $stmt->bindParam(':chosenspeaker', $_POST['chosen']);
                $stmt->bindParam(':ip', $_SERVER['HTTP_X_REAL_IP']);

                if (!$stmt->execute()) {
                    throw new PDOException($stmt->errorInfo()[2]);
                }
            }

            $stmt = $dbh->prepare('INSERT INTO alevelballspeech(chosenspeaker, ip) VALUES (:chosenspeaker, :ip)');
            $stmt->bindParam(':chosenspeaker', $_POST['chosen']);
            $stmt->bindParam(':ip', $_SERVER['HTTP_X_REAL_IP']);

            if (!$stmt->execute()) {
                throw new PDOException($stmt->errorInfo()[2]);
            }

            echo 'ok;'.$_POST['chosen'];
        } else {
            echo 'closed';
        }
    }

    $finished = true;

    $dbh = get_dbh($_ENV['PGSQL_DATABASE']);
    $candidateNames = array(
        'Elisabeth Schwab',
        'Jonas Thelemann',
        'Rosa Freytag',
    );

    function get_populated_candidate_survey($skeletonContent)
    {
        global $finished;
        global $dbh;

        // Initialize the required tables
        foreach (array('surveys', 'a_level_ball_speech') as $tableName) {
            init_table($dbh, $tableName);
        }

        $rowForCurrentIp = get_row_for_current_ip($dbh, 'a_level_ball_speech');
        $statusHtml = '';

        if ($finished) {
            $statusHtml = get_survey_status_html(array('demo', 'privacy'), true);
        }

        $alertHtml = '
        <div class="alert ';

        if (!$rowForCurrentIp && !$finished) {
            $alertHtml .= 'hidden ';
        }

        $alertHtml .= 'success" id="successpopup">
        <span>
            Vielen Dank!
        </span>
        <p>
            Deine Stimme wurde gezählt<strike>, kann aber noch von dir verändert werden</strike>.
            <br>
            Du hast für <strong id="lastchoice">';

        if ($rowForCurrentIp) {
            if ($rowForCurrentIp['chosenspeaker'] == 'candidateelisabeth') {
                $alertHtml .= 'E********';
            } elseif ($rowForCurrentIp['chosenspeaker'] == 'candidatejonas') {
                $alertHtml .= 'J****';
            } elseif ($rowForCurrentIp['chosenspeaker'] == 'candidaterosa') {
                $alertHtml .= 'R***';
            } elseif ($rowForCurrentIp['chosenspeaker'] == 'nobody') {
                $alertHtml .= 'Niemanden';
            }
        }

        $alertHtml .= '
                </strong> gestimmt.
            </p>
        </div>
        <div class="alert hidden warning" id="warningpopup">
            <span>
                Warnung!
            </span>
            <p>
                Deine Stimme wurde <strong>noch nicht</strong> gezählt.
            </p>
            <p id="warningclick">
                Klicke auf die von dir an- oder abgewählte Person, um deine Wahl zu bestätigen.
            </p>
        </div>';

        return $alertHtml.$statusHtml.$skeletonContent;
    }

    $skeletonContent = '';

    $chosenSpeaker = null;

    // if ($rowForCurrentIp['chosenspeaker'] == 'candidateelisabeth') {
    //     $chosenSpeaker = $candidateNames[0];
    // } elseif ($rowForCurrentIp['chosenspeaker'] == 'candidatejonas') {
    //     $chosenSpeaker = $candidateNames[1];
    // } elseif ($rowForCurrentIp['chosenspeaker'] == 'candidaterosa') {
    //     $chosenSpeaker = $candidateNames[2];
    // }

    $chSpCensoredNameStar = get_censored_name_star(get_first_name($chosenSpeaker));
    $chSpCensoredNameLine = get_censored_name_line(get_first_name($chosenSpeaker));
    $chSpCensoredFullNameStar = get_censored_full_name_star($chosenSpeaker);

    $skeletonContent .= '<figure id="candidate'.$chSpCensoredNameStar.'" class="draggable drag-drop">
        <img alt="'.$chSpCensoredNameLine.'" src="layout/images/'.$chSpCensoredNameLine.'.png">
        <figcaption>
            '.$chSpCensoredFullNameStar.'
        </figcaption>
    </figure>';

    // if ($rowForCurrentIp['chosenspeaker'] != 'candidateelisabeth') {
    //     $skeletonContent .= $candidateelisabeth;
    // }
    // if ($rowForCurrentIp['chosenspeaker'] != 'candidatejonas') {
    //     $skeletonContent .= $candidatejonas;
    // }
    // if ($rowForCurrentIp['chosenspeaker'] != 'candidaterosa') {
    //     $skeletonContent .= $candidaterosa;
    // }
