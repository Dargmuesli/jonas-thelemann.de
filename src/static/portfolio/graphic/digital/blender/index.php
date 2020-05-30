<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    last_modified(get_page_mod_time());

    $skeletonDescription = 'Vorstellung meiner 3D-Renderings';
    $skeletonFeatures = ['lcl/ext/js'];
    $skeletonContent = '
    <section id="gallerie" class="section scrollspy">
        <h2>
            Gallerie
        </h2>
        <div class="slider">
            <ul class="slides">
                <li>
                    <img src="layout/images/diashow/alpha.jpg">
                    <div class="caption center-align">
                        <h3>
                            Ca&shy;mi&shy;nan&shy;des
                        </h3>
                        <h5 class="light grey-text text-lighten-3">
                            Von Pablo Vazquez, Beorn Leonard and Francesco Siddi.
                        </h5>
                    </div>
                </li>
                <li>
                    <img src="layout/images/diashow/bravo.jpg">
                    <div class="caption center-align">
                        <h3>
                            Kirsch&shy;blü&shy;ten
                        </h3>
                        <h5 class="light grey-text text-lighten-3">
                            Von Jonas Thelemann nach einem Tutorial von Andrew Price.
                        </h5>
                    </div>
                </li>
                <li>
                    <img src="layout/images/diashow/charlie.jpg">
                    <div class="caption center-align">
                        <h3>
                            Früh&shy;stück
                        </h3>
                        <h5 class="light grey-text text-lighten-3">
                            Von Jonas Thelemann nach einem Tutorial von Andrew Price.
                        </h5>
                    </div>
                </li>
                <li>
                    <img src="layout/images/diashow/delta.jpg">
                    <div class="caption center-align">
                        <h3>
                            Blau&shy;pau&shy;se
                        </h3>
                        <h5 class="light grey-text text-lighten-3">
                            Von Jonas Thelemann.
                        </h5>
                    </div>
                </li>
                <li>
                    <img src="layout/images/diashow/echo.jpg">
                    <div class="caption center-align">
                        <h3>
                            Weih&shy;nachts&shy;fest
                        </h3>
                        <h5 class="light grey-text text-lighten-3">
                            Von Jonas Thelemann.
                        </h5>
                    </div>
                </li>
                <li>
                    <img src="layout/images/diashow/foxtrot.jpg">
                    <div class="caption center-align">
                        <h3>
                            Tears Of Steel
                        </h3>
                        <h5 class="light grey-text text-lighten-3">
                            Von der Blender Foundation.
                        </h5>
                    </div>
                </li>
                <li>
                    <img src="layout/images/diashow/golf.jpg">
                    <div class="caption center-align">
                        <h3>
                            Gren&shy;zen
                        </h3>
                        <h5 class="light grey-text text-lighten-3">
                            Von Spelle.
                        </h5>
                    </div>
                </li>
                <li>
                    <img src="layout/images/diashow/hotel.jpg">
                    <div class="caption center-align">
                        <h3>
                            Au&shy;to
                        </h3>
                        <h5 class="light grey-text text-lighten-3">
                            Von Kingofspeed.
                        </h5>
                    </div>
                </li>
                <li>
                    <img src="layout/images/diashow/india.jpg">
                    <div class="caption center-align">
                        <h3>
                            Was&shy;ser&shy;glas
                        </h3>
                        <h5 class="light grey-text text-lighten-3">
                            Von Jonas Thelemann nach einem Tutorial von Andrew Price.
                        </h5>
                    </div>
                </li>
                <li>
                    <img src="layout/images/diashow/juliett.jpg">
                    <div class="caption center-align">
                        <h3>
                            Gi&shy;tar&shy;re
                        </h3>
                        <h5 class="light grey-text text-lighten-3">
                            Von Jonas Thelemann.
                        </h5>
                    </div>
                </li>
                <li>
                    <img src="layout/images/diashow/kilo.jpg">
                    <div class="caption center-align">
                        <h3>
                            Haus
                        </h3>
                        <h5 class="light grey-text text-lighten-3">
                            Von Power.
                        </h5>
                    </div>
                </li>
                <li>
                    <img src="layout/images/diashow/lima.jpg">
                    <div class="caption center-align">
                        <h3>
                            Nick&shy;name
                        </h3>
                        <h5 class="light grey-text text-lighten-3">
                            Von Jonas Thelemann nach einem Tutorial von Andrew Price.
                        </h5>
                    </div>
                </li>
                <li>
                    <img src="layout/images/diashow/mike.jpg">
                    <div class="caption center-align">
                        <h3>
                            Wald&shy;flug
                        </h3>
                        <h5 class="light grey-text text-lighten-3">
                            Von Rob Tuytel und Jonas Thelemann.
                        </h5>
                    </div>
                </li>
                <li>
                    <img src="layout/images/diashow/november.jpg">
                    <div class="caption center-align">
                        <h3>
                            Welt&shy;raum
                        </h3>
                        <h5 class="light grey-text text-lighten-3">
                            Von Trevor Perger.
                        </h5>
                    </div>
                </li>
                <li>
                    <img src="layout/images/diashow/oscar.jpg">
                    <div class="caption center-align">
                        <h3>
                            Au&shy;to der Zu&shy;kunft
                        </h3>
                        <h5 class="light grey-text text-lighten-3">
                            Von Jonas Thelemann.
                        </h5>
                    </div>
                </li>
                <li>
                    <img src="layout/images/diashow/papa.jpg">
                    <div class="caption center-align">
                        <h3>
                            Ren&shy;nen
                        </h3>
                        <h5 class="light grey-text text-lighten-3">
                            Von Pokestuff.
                        </h5>
                    </div>
                </li>
                <li>
                    <img src="layout/images/diashow/quebec.jpg">
                    <div class="caption center-align">
                        <h3>
                            Renn&shy;au&shy;to
                        </h3>
                        <h5 class="light grey-text text-lighten-3">
                            Von RichardUpshur.
                        </h5>
                    </div>
                </li>
                <li>
                    <img src="layout/images/diashow/romeo.jpg">
                    <div class="caption center-align">
                        <h3>
                            Fun&shy;ken
                        </h3>
                        <h5 class="light grey-text text-lighten-3">
                            Von Andrew Price.
                        </h5>
                    </div>
                </li>
                <li>
                    <img src="layout/images/diashow/sierra.jpg">
                    <div class="caption center-align">
                        <h3>
                            Sumpf&shy;ge&shy;biet
                        </h3>
                        <h5 class="light grey-text text-lighten-3">
                            Von Focusgfx.
                        </h5>
                    </div>
                </li>
                <li>
                    <img src="layout/images/diashow/tango.jpg">
                    <div class="caption center-align">
                        <h3>
                            Ge&shy;fäng&shy;nis&shy;zel&shy;le
                        </h3>
                        <h5 class="light grey-text text-lighten-3">
                            Von Jonas Thelemann.
                        </h5>
                    </div>
                </li>
                <li>
                    <img src="layout/images/diashow/uniform.jpg">
                    <div class="caption center-align">
                        <h3>
                            Mi&shy;s3&shy;ri&shy;a
                        </h3>
                        <h5 class="light grey-text text-lighten-3">
                            Von Jonas Thelemann.
                        </h5>
                    </div>
                </li>
                <li>
                    <img src="layout/images/diashow/victor.jpg">
                    <div class="caption center-align">
                        <h3>
                            Mine&shy;craft
                        </h3>
                        <h5 class="light grey-text text-lighten-3">
                            Von Jonas Thelemann.
                        </h5>
                    </div>
                </li>
            </ul>
        </div>
        <blockquote>
            <p>
                Blender ist eine kostenlose Open-Source 3D Animations Anwendung. Es unterstützt die Gesamtheit der 3D-Pipeline-Modellierung, Rigging, Animation, Simulation, Rendering, Compositing und Motion-Tracking, sowie Videobearbeitung und Spiel-Design. Fortgeschrittene Anwender können sich mit der Blender API für Python-Skripte beschäftigen, um die Anwendung zu personalisieren und um spezielle Tools zu schreiben, die oft in zukünftigen Versionen enthalten sind. Blender ist gut geeignet für Einzelpersonen und kleine Studios, die von einer einheitlichen Pipeline und Entwicklungsinteresse profitieren. Beispiele aus vielen Blender-Projekten befinden sich in der Galerie.
            </p>
            <p>
                Blender ist Cross-Plattform und läuft genauso gut auf Linux-, Windows- und Macintosh-Computer. Das Interface nutzt OpenGL, um eine konsistente Erfahrung zu bieten. Um Kompatibilität zu bestätigen, wird die Liste der unterstützten Plattformen vom Entwicklungsteam regelmäßig geprüft.
            </p>
            <p>
                Als Gemeinschafts-Projekt unter der GNU General Public License (GPL) ist es der Öffentlichkeit erlaubt, Änderungen an der Code-Basis, die zu neuen Funktionen, Bugfixes und einer besseren Benutzerfreundlichkeit führt, zu machen. Blender hat keinen Preis, aber Sie können investieren, um sich zu beteiligen und zu helfen, ein leistungsfähiges Tool für die Zusammenarbeit voranzubringen: Blender ist Ihre eigene 3D-Software.
            </p>
            <small>
                Jemand wichtiges auf
                <a href="https://www.blender.org/about/" target="_blank">
                    <cite>
                        blender.org/about/
                    </cite>
                </a>
            </small>
        </blockquote>
        <div class="row">
            <div class="col s12 m6">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title">
                            blender.org
                        </span>
                        <p>
                            Die offizielle Website von Blender mit allen Neuigkeiten rund um die Software.
                        </p>
                    </div>
                    <div class="card-action">
                        <a href="https://www.blender.org" rel="noopener" target="_blank">
                            blender.org
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>';

    output_html($skeletonDescription, $skeletonContent, $skeletonFeatures);
