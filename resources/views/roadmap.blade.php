@include('partials.head')
<div class="page">
@include('partials.header')
<!-- BEGIN content -->
    <section class="roadmap">
        <div class="container">
            <h1 class="page-title">
                <span class="page-title__text">Roadmap</span>
                <span class="page-title__bg">Roadmap</span>
            </h1>
            <div class="tags">
                @foreach($tags as $tag)
                    <div class="tags__item">
                        <span class="tag {{ $loop->first?'tag--active':'' }}">{{ $tag->name }}</span>
                    </div>
                @endforeach
            </div>
            <div id="roadmap" class="roadmap">
                <div class="progress-bar__btns">
                    <button class="btn btn--transition prev">
                        <i class="icon"></i>
                    </button>
                    <button class="btn btn--transition next">
                        <i class="icon"></i>
                    </button>
                </div>
                <div class="progress-bar">
                    <div id="filters" class="progress-bar__row">

                        @foreach($points as $point)
                            <div class="progress-bar__item {{ !$points[$loop->index+1]->done?'is-active':'' }}">
                                <button type="button" data-filter=".idea" class="progress-bar__btn"></button>
                                <span class="progress-bar__event">{{ $point->name }}</span>
                                <span class="progress-bar__date">{{ $point->month }} <br> {{ $point->year }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="grid">
                <div class="grid-sizer"></div>
                <div class="gutter-sizer"></div>
                <div class="grid-item idea done">
                    <div class="card">
                        <div class="card__header">
                            <span class="card__header-text"> done</span>
                        </div>
                        <div class="card__body">
                            <h4 class="card__body-title">The technique of mapping the map</h4>
                            <p class="card__body-text"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint,
                                accusantium. </p>
                        </div>
                    </div>
                </div>
                <div class="grid-item access done">
                    <div class="card">
                        <div class="card__header">
                            <span class="card__header-text"> done</span>
                        </div>
                        <div class="card__body">
                            <h4 class="card__body-title">Improve the logic of collecting resources with an inventory
                                tool available</h4>
                            <p class="card__body-text"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum
                                magnam saepe voluptas ipsum in dolores. </p>
                        </div>
                    </div>
                </div>
                <div class="grid-item idea done">
                    <div class="card">
                        <div class="card__header">
                            <span class="card__header-text"> done</span>
                        </div>
                        <div class="card__body">
                            <h4 class="card__body-title">The technique of mapping the map</h4>
                            <p class="card__body-text"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque
                                optio consequatur voluptatum ipsam nisi et labore nesciunt quos error asperiores. </p>
                        </div>
                    </div>
                </div>
                <div class="grid-item beta done">
                    <div class="card">
                        <div class="card__header">
                            <span class="card__header-text"> done</span>
                        </div>
                        <div class="card__body">
                            <h4 class="card__body-title">Improve the logic of c logic of collecting resources with an
                                inventory tool available</h4>
                            <p class="card__body-text"> Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Expedita, sapiente obcaecati! Ipsam voluptatum repellendus incidunt eum voluptatibus
                                laborum quod ex possimus, illum minima quasi ab perferendis! Saepe vitae eius esse? </p>
                        </div>
                    </div>
                </div>
                <div class="grid-item later done">
                    <div class="card">
                        <div class="card__header">
                            <span class="card__header-text"> done</span>
                        </div>
                        <div class="card__body">
                            <h4 class="card__body-title">The technique of mapping the map</h4>
                            <p class="card__body-text"> You can make yontable Spinner Wheel, climb around your base with
                                the new new Netting, or cosy up on the remade bed. We&#39;ve optimised the fire fight
                                lag, the Airfield will be getting tunnels, and moreYou can make your decisions 100%
                                more dramatic with the paintable Spinner Wheel, climb around your base with the new new
                                Netting, or cosy up on the remade bed. We&#39;ve optimised the fire fight lag, the
                                Airfield will be getting tunnels, and moreYou can make your
                                decisions 100% more dramatic with the paintable Spinner Wheel, climb around your base
                                with the new new Netting, or cosy up on the remade bed. We&#39;ve optimised the fire
                                fight lag, the Airfield will be getting tunnels, and moreYou
                                can make your decisions 100% more dramatic with the paintable Spinner Wheel, climb
                                around your base with the new new Netting, or cosy up on the remade bed. We&#39;ve
                                optimised the fire fight lag, the Airfield will be getting tunnels,
                                and more </p>
                        </div>
                    </div>
                </div>
                <div class="grid-item beta new">
                    <div class="card">
                        <div class="card__header">
                            <span class="card__header-text"> new</span>
                        </div>
                        <div class="card__body">
                            <h4 class="card__body-title">The technique of mapping the map</h4>
                            <p class="card__body-text"> You can make yourtable Spinner Wheel, climb around yNetting, or
                                cosy up on the remade bed. We&#39;ve optimised the fire fight lag, the Airfield will be
                                getting tunnels, and moreYou can make your decisions 100% more dramatic with the
                                paintable Spinner Wheel, climb around your base with the new new Netting, or cosy up on
                                the remade bed. We&#39;ve optimised the fire fight lag, the Airfield will be getting
                                tunnels, and moreYou can make your decisions 100% more dramatic
                                with the paintable Spinner Wheel, climb around your base with the new new Netting, or
                                cosy up on the remade bed. We&#39;ve optimised the fire fight lag, the Airfield will be
                                getting tunnels, and moreYou can make your decisions 100%
                                more dramatic with the paintable Spinner Wheel, climb around your base with the new new
                                Netting, or cosy up on the remade bed. We&#39;ve optimised the fire fight lag, the
                                Airfield will be getting tunnels, and more </p>
                        </div>
                    </div>
                </div>
                <div class="grid-item alpha new">
                    <div class="card">
                        <div class="card__header">
                            <span class="card__header-text"> new</span>
                        </div>
                        <div class="card__body">
                            <h4 class="card__body-title">The technique of mapping the map</h4>
                            <p class="card__body-text"> pinner Wheel, climb tunnels, and more </p>
                        </div>
                    </div>
                </div>
                <div class="grid-item alpha done">
                    <div class="card">
                        <div class="card__header">
                            <span class="card__header-text"> done</span>
                        </div>
                        <div class="card__body">
                            <h4 class="card__body-title">The technique of mapping the map</h4>
                            <p class="card__body-text"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum
                                aspernatur soluta, quibusdam nesciunt qui vitae officiis ratione culpa inventore ducimus
                                ullam perspiciatis! Est culpa soluta eos nemo nobis corporis ex. </p>
                        </div>
                    </div>
                </div>
                <div class="grid-item idea new">
                    <div class="card">
                        <div class="card__header">
                            <span class="card__header-text"> new</span>
                        </div>
                        <div class="card__body">
                            <h4 class="card__body-title">The technique of mapping the map</h4>
                            <p class="card__body-text"> You can make your decisioemade bed. We&#39;ve optimised the fire
                                fight lag, the Airfield will be getting tunnels, and more </p>
                        </div>
                    </div>
                </div>
                <div class="grid-item access done">
                    <div class="card">
                        <div class="card__header">
                            <span class="card__header-text"> done</span>
                        </div>
                        <div class="card__body">
                            <h4 class="card__body-title">Improve the logic of collecting resources with an inventory
                                tool available</h4>
                            <p class="card__body-text"></p>
                        </div>
                    </div>
                </div>
                <div class="grid-item access done">
                    <div class="card">
                        <div class="card__header">
                            <span class="card__header-text"> done</span>
                        </div>
                        <div class="card__body">
                            <h4 class="card__body-title">Improve the logic of collecting resources with an inventory
                                tool available</h4>
                            <p class="card__body-text"></p>
                        </div>
                    </div>
                </div>
                <div class="grid-item idea new">
                    <div class="card">
                        <div class="card__header">
                            <span class="card__header-text"> new</span>
                        </div>
                        <div class="card__body">
                            <h4 class="card__body-title">The technique of mapping the map</h4>
                            <p class="card__body-text"> You can make your decisions 100% more dramatic with the
                                paintable Spinner Wheel, climb around your base with the new new Netting, or cosy up on
                                the remade bed. We&#39;ve optimised the fire fight lag, the Airfield will be getting
                                tunnels,
                                and more </p>
                        </div>
                    </div>
                </div>
                <div class="grid-item beta done">
                    <div class="card">
                        <div class="card__header">
                            <span class="card__header-text"> done</span>
                        </div>
                        <div class="card__body">
                            <h4 class="card__body-title">Improve the logic of collecting resources with an inventory
                                tool available Improve the logic of collecting resources with an inventory tool
                                available</h4>
                            <p class="card__body-text"> You can make your decision Wheel, climb around your base with
                                the new new Netting, or cosy up on the remade bed. We&#39;ve optimised the fire fight
                                lag, the Airfield will be getting tunnels, and more </p>
                        </div>
                    </div>
                </div>
                <div class="grid-item later new">
                    <div class="card">
                        <div class="card__header">
                            <span class="card__header-text"> new</span>
                        </div>
                        <div class="card__body">
                            <h4 class="card__body-title">The technique of mapping the map</h4>
                            <p class="card__body-text"> You can maWheel, climb around your base with the new new
                                Netting, or cosy up on the remade bed. We&#39;ve optimised the fire fight lag, the
                                Airfield will be getting tunnels, and moreYou can make your decisions 100% more dramatic
                                with
                                the paintable Spinner Wheel, climb around your base with the new new Netting, or cosy up
                                on the remade bed. We&#39;ve optimised the fire fight lag, the Airfield will be getting
                                tunnels, and moreYou can make your decisions 100% more
                                dramatic with the paintable Spinner Wheel, climb around your base with the new new
                                Netting, or cosy up on the remade bed. We&#39;ve optimised the fire fight lag, the
                                Airfield will be getting tunnels, and moreYou can make your decisions
                                100% more dramatic with the paintable Spinner Wheel, climb around your base with the new
                                new Netting, or cosy up on the remade bed. We&#39;ve optimised the fire fight lag, the
                                Airfield will be getting tunnels, and more </p>
                        </div>
                    </div>
                </div>
                <div class="grid-item beta new">
                    <div class="card">
                        <div class="card__header">
                            <span class="card__header-text"> new</span>
                        </div>
                        <div class="card__body">
                            <h4 class="card__body-title">The technique of mapping the map</h4>
                            <p class="card__body-text"> You can make your decisions 100% more dramatic with the
                                paintable Spinner Wheel, climb around your base with the new new Netting, or cosy up on
                                the remade bed. We&#39;ve optimised the fire fight lag, the Airfield will be getting
                                tunnels,
                                and moreYou can make your decisions 100% more dramatic with the paintable Spinner Wheel,
                                climb around your base with the new new Netting, or cosy up on the remade bed. We&#39;ve
                                optimised the fire fight lag, the Airfield will be getting
                                tunnels, and moreYou can make your decisions 100% more dramatic with the paintable
                                Spinner Wheel, climb around your base with the new new Netting, or cosy up on the remade
                                bed. We&#39;ve optimised the fire fight lag, the Airfield will
                                be getting tunnels, and moreYou can make your decisions 100% more dramatic with the
                                paintable Spinner Wheel, climb around your base with the new new Netting, or cosy up on
                                the remade bed. We&#39;ve optimised the fire fight lag, the
                                Airfield will be getting tunnels, and more </p>
                        </div>
                    </div>
                </div>
                <div class="grid-item alpha new">
                    <div class="card">
                        <div class="card__header">
                            <span class="card__header-text"> new</span>
                        </div>
                        <div class="card__body">
                            <h4 class="card__body-title">The technique of mapping the map</h4>
                            <p class="card__body-text"> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem
                                adipisci laudantium sed odit harum ea voluptate inventore labore aliquam ullam quod, a
                                neque cumque. Soluta explicabo provident rerum recusandae, perspiciatis repellendus
                                quidem odio eum architecto, molestias voluptas atque veritatis nostrum tempora aut vitae
                                eos earum veniam vero magni eligendi temporibus. </p>
                        </div>
                    </div>
                </div>
                <div class="grid-item alpha done">
                    <div class="card">
                        <div class="card__header">
                            <span class="card__header-text"> done</span>
                        </div>
                        <div class="card__body">
                            <h4 class="card__body-title">The technique of mapping the map</h4>
                            <p class="card__body-text"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam,
                                repellat nihil possimus illum eaque illo expedita error deleniti ipsum? Recusandae cum
                                asperiores ipsa ad repudiandae, officia consectetur inventore porro impedit! </p>
                        </div>
                    </div>
                </div>
                <div class="grid-item idea new">
                    <div class="card">
                        <div class="card__header">
                            <span class="card__header-text"> new</span>
                        </div>
                        <div class="card__body">
                            <h4 class="card__body-title">The technique of mapping the map</h4>
                            <p class="card__body-text"> You can make your decisions 100% more dramatic with the
                                paintable Spinner Wheel, climb around your base with the new new Netting, or cosy up on
                                the remade bed. We&#39;ve optimised the fire fight lag, the Airfield will be getting
                                tunnels,
                                and more </p>
                        </div>
                    </div>
                </div>
                <div class="grid-item access done">
                    <div class="card">
                        <div class="card__header">
                            <span class="card__header-text"> done</span>
                        </div>
                        <div class="card__body">
                            <h4 class="card__body-title">Improve the logic of collecting resources with an inventory
                                tool available</h4>
                            <p class="card__body-text"></p>
                        </div>
                    </div>
                </div>
                <div class="grid-item idea new">
                    <div class="card">
                        <div class="card__header">
                            <span class="card__header-text"> new</span>
                        </div>
                        <div class="card__body">
                            <h4 class="card__body-title">The technique of mapping the map</h4>
                            <p class="card__body-text"> You can make your decisions 100% more dramatic with the
                                paintable Spinner Wheel, climb around your base with the new new Netting, or cosy up on
                                the remade bed. We&#39;ve optimised the fire fight lag, the Airfield will be getting
                                tunnels,
                                and more </p>
                        </div>
                    </div>
                </div>
                <div class="grid-item beta done">
                    <div class="card">
                        <div class="card__header">
                            <span class="card__header-text"> done</span>
                        </div>
                        <div class="card__body">
                            <h4 class="card__body-title">Improve the logic of collecting resources with an inventory
                                tool available Improve the logic of collecting resources with an inventory tool
                                available</h4>
                            <p class="card__body-text"> You can make your decisions 100% more dramatic with the
                                paintable Spinner Wheel, climb around your base with the new new Netting, or cosy up on
                                the remade bed. We&#39;ve optimised the fire fight lag, the Airfield will be getting
                                tunnels,
                                and more </p>
                        </div>
                    </div>
                </div>
                <div class="grid-item later done">
                    <div class="card">
                        <div class="card__header">
                            <span class="card__header-text"> done</span>
                        </div>
                        <div class="card__body">
                            <h4 class="card__body-title">The technique of mapping the map</h4>
                            <p class="card__body-text"> You can make your decisions 100% more dramatic with the
                                paintable Spinner Wheel, climb around your base with the new new Netting, or cosy up on
                                the remade bed. We&#39;ve optimised the fire fight lag, the Airfield will be getting
                                tunnels,
                                and moreYou can make your decisions 100% more dramatic with the paintable Spinner Wheel,
                                climb around your base with the new new Netting, or cosy up on the remade bed. We&#39;ve
                                optimised the fire fight lag, the Airfield will be getting
                                tunnels, and moreYou can make your decisions 100% more dramatic with the paintable
                                Spinner Wheel, climb around your base with the new new Netting, or cosy up on the remade
                                bed. We&#39;ve optimised the fire fight lag, the Airfield will
                                be getting tunnels, and moreYou can make your decisions 100% more dramatic with the
                                paintable Spinner Wheel, climb around your base with the new new Netting, or cosy up on
                                the remade bed. We&#39;ve optimised the fire fight lag, the
                                Airfield will be getting tunnels, and more </p>
                        </div>
                    </div>
                </div>
                <div class="grid-item beta new">
                    <div class="card">
                        <div class="card__header">
                            <span class="card__header-text"> new</span>
                        </div>
                        <div class="card__body">
                            <h4 class="card__body-title">The technique of mapping the map</h4>
                            <p class="card__body-text"> You can make your decisions 100% more dramatic with the
                                paintable Spinner Wheel, climb around your base with the new new Netting, or cosy up on
                                the remade bed. We&#39;ve optimised the fire fight lag, the Airfield will be getting
                                tunnels,
                                and moreYou can make your decisions 100% more dramatic with the paintable Spinner Wheel,
                                climb around your base with the new new Netting, or cosy up on the remade bed. We&#39;ve
                                optimised the fire fight lag, the Airfield will be getting
                                tunnels, and moreYou can make your decisions 100% more dramatic with the paintable
                                Spinner Wheel, climb around your base with the new new Netting, or cosy up on the remade
                                bed. We&#39;ve optimised the fire fight lag, the Airfield will
                                be getting tunnels, and moreYou can make your decisions 100% more dramatic with the
                                paintable Spinner Wheel, climb around your base with the new new Netting, or cosy up on
                                the remade bed. We&#39;ve optimised the fire fight lag, the
                                Airfield will be getting tunnels, and more </p>
                        </div>
                    </div>
                </div>
                <div class="grid-item alpha new">
                    <div class="card">
                        <div class="card__header">
                            <span class="card__header-text"> new</span>
                        </div>
                        <div class="card__body">
                            <h4 class="card__body-title">The technique of mapping the map</h4>
                            <p class="card__body-text"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus,
                                consequuntur quae doloremque suscipit officiis officia vitae in magnam voluptatem nihil
                                ipsa libero illum esse error magni quibusdam quasi, dolores laudantium. </p>
                        </div>
                    </div>
                </div>
                <div class="grid-item alpha done">
                    <div class="card">
                        <div class="card__header">
                            <span class="card__header-text"> done</span>
                        </div>
                        <div class="card__body">
                            <h4 class="card__body-title">The technique of mapping the map</h4>
                            <p class="card__body-text"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END content -->
    @include('partials.footer')
</div>
@include('partials.scripts')