@extends('main')

@section('title', "VINCI'SHOP – Boutique éphémère")

@section('content')
    <div id="page" class="site">
        {{--        <a class="skip-link screen-reader-text" href="#content">Aller au contenu principal</a>--}}




                    <main id="main" class="site-main mt-4">
                        <article class="twentyseventeen-panel page type-page status-publish hentry">
                            <div class="panel-content">
                                <div class="container-fluid container-md">
                                    <div class="entry-content">
                                        @if($errors->any())
                                            <div class="alert alert-danger mb-5 text-center">
                                                <p>Une erreur est survenue lors de la validation de votre commande</p>
                                                <ul>
                                                    @foreach($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        @if($success)
                                            <div class="alert alert-success mb-5 text-center">
                                                <p>Votre commande a bien été prise en compte ! <br>
                                                    Un mail de confirmation vous a été envoyé.
                                                </p>
                                                <p><a href="#horaires">Rendez vous au Lycée pour récupérer votre commande</a></p>
                                            </div>
                                        @endif

                                            <div class="text-center">
                                                <h3>Les étudiants des BTS commerciaux du <a href="https://www.vinci-melun.org/">Lycée Polyvalent Léonard de Vinci (Melun)</a> s’emparent d’un concept tendance : le
                                                    <strong>pop up store </strong></h3>
                                            </div>

                                        <div
                                            class="wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile"
                                            style="grid-template-columns:auto 33%">
                                            <div class="wp-block-media-text__content">
                                                <h2><strong>Qu’est-ce qu’un pop up store ?</strong></h2>
                                            </div>
                                            <figure class="wp-block-media-text__media">
                                                <img decoding="async" width="1024" height="512"
                                                     src="{{ asset('storage/images/nuageMots.png') }}"
                                                >
                                            </figure>
                                        </div>

                                        <p>Un pop up store ou «&nbsp;une boutique éphémère&nbsp;» est un espace de vente
                                            créatif et temporaire. Les clients y achètent des produits au détail dans un
                                            univers spécialement pensé pour l’occasion.</p>
                                        <p><strong>Le principe</strong> : installer un point de vente et le faire
                                            disparaitre en quelques jours, quelques semaines ou quelques mois. </p>
                                        <p><strong>Le but </strong>: vendre des produits ou des services en proposant
                                            aux clients une experience étonnante. </p>



                                        <h2 id="horaires"><strong>Horaires d'ouverture du Pop up store </strong></h2>


                                        <div class="wp-block-cover is-light has-small-font-size"
                                             style="min-height:151px">
                                            <span aria-hidden="true"
                                                  class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
                                            <img decoding="async" loading="lazy" width="640" height="427"
                                                class="wp-block-cover__image-background wp-image-116" alt=""
                                                src="{{ asset('storage/images/img2.jpg') }}"
                                                data-object-fit="cover">
                                        </div>

                                        <hr class="wp-block-separator has-alpha-channel-opacity">
                                            <table>
                                                <tr>
                                                    <th>08/03/2023</th>
                                                    <th>09/03/2023</th>
                                                    <th>10/03/2023</th>
                                                    <th>11/03/2023</th>
                                                </tr>
                                                <tr>
                                                    <td>12h20-13h25</td>
                                                    <td>12h20-13h25</td>
                                                    <td>12h20-13h25</td>
                                                    <td>8h30-12h30</td>
                                                </tr>
                                                <tr>
                                                    <td>17h30-18h30</td>
                                                    <td>16h30-18h30</td>
                                                    <td>15h30-18h30</td>
                                                    <td></td>
                                                </tr>
                                            </table>
                                            <table>
                                                <tr>
                                                    <th>Du 14 au 17 mars 2023</th>
                                                </tr>
                                                <tr>
                                                    <td>12h20-13h20</td>
                                                </tr>
                                            </table>
                                            <p>Nous vous retrouverons à droite du CDI dans le lycée</p>



                                        <div class="is-layout-flex wp-block-buttons">
                                            <div class="wp-block-button aligncenter">
                                                <a class="wp-block-button__link has-luminous-vivid-orange-background-color has-background wp-element-button" href="/visiteur/produit">Précommandes</a>
                                            </div>
                                        </div>


                                        <p></p>
                                    </div><!-- .entry-content -->

                                </div><!-- .wrap -->
                            </div><!-- .panel-content -->

                        </article><!-- #post-59 -->


                    </main><!-- #main -->
                </div><!-- #primary -->





@endsection

@section('scripts')

@endsection
