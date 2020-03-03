<?php
namespace Elementor;

class Team_Section_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'Team';
    }
    public function get_title()
    {
        return __('Team', 'team-section');
    }
    public function get_icon()
    {
        return 'fa fa-pinterest';
    }
    public function get_categories()
    {
        return array('Talib');
    }
    protected function _register_controls()
    {
        $this->start_controls_section(
            'section_information',
            array(
                'label' => __('Information', 'team-section'),
                'type' => Controls_Manager::TAB_CONTENT,

            )
        );
        $this->add_control(
            'image',
            array(
                'label' => __('Image', 'team-section'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],

            )
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                // 'exclude' => ['custom'],
                'include' => [],
                'default' => 'full',
            ]
        );

        $this->add_control(
            'job_title',
            array(
                'label' => __('Job Title', 'team-section'),
                'type' => Controls_Manager::TEXT,
                'default' => __('CEO', 'team-section'),

            )
        );
        $this->add_control(
            'name',
            array(
                'label' => __('Name', 'team-section'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Alex', 'team-section'),

            )
        );

        $this->add_control(
            'bio',
            array(
                'label' => __('Short Bio', 'team-section'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('The one that puts it all together', 'team-section'),

            )
        );

        $this->add_control(
            'header_tag',
            [
                'label' => __('HTML tag for Name', 'team-section'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'default' => 'h2',
                'toggle' => true,
                'separator' => 'before',
                'options' => [
                    'h1' => [
                        'title' => __('h1', 'team-section'),
                        'icon' => 'eicon-editor-h1',
                    ],
                    'h2' => [
                        'title' => __('h2', 'team-section'),
                        'icon' => 'eicon-editor-h2',
                    ],
                    'h3' => [
                        'title' => __('h3', 'team-section'),
                        'icon' => 'eicon-editor-h3',
                    ],
                    'h4' => [
                        'title' => __('h4', 'team-section'),
                        'icon' => 'eicon-editor-h4',
                    ],
                    'h5' => [
                        'title' => __('h5', 'team-section'),
                        'icon' => 'eicon-editor-h5',
                    ],
                    'h6' => [
                        'title' => __('h6', 'team-section'),
                        'icon' => 'eicon-editor-h6',
                    ],
                ],
            ]
        );
        $this->add_control(
            'align',
            [
                'label' => __('Alignment', 'team-section'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'team-section'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'team-section'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'team-section'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .our-team' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'show_social_icons',
            [
                'label' => __('Social Icon', 'team-section'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'your-plugin'),
                'label_off' => __('Hide', 'your-plugin'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'team_membar_social_links',
            array(
                'label' => __('Social Links', 'team-section'),
                'type' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'show_social_icons' => 'yes',
                ],

            )
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'name',
            [
                'label' => __('Site Name', 'team-section'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __('facebook', 'team-section'),
            ]
        );
        $repeater->add_control(
            'link_icon',
            array(
                'label' => __('Icon', 'team-section'),
                'type' => Controls_Manager::ICON,
                'default' => [
                    'icon' => 'fa fa-facebook',
                ],
            )
        );

        $repeater->add_control(
            'link_url',
            array(
                'label' => __(' URL', 'team-section'),
                'type' => Controls_Manager::URL,
                'label_block' => false,
                'placeholder' => __('https://your-link.com', 'team-section'),
            )
        );
        $this->add_control(
            'social_links',
            array(
                'label' => __('Social Links', 'team-section'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{name}}}',
                'condition' => [
                    'show_social_icons' => 'yes',
                ],
            )
        );
        $this->end_controls_section();

        // STYLE TAB
        $this->start_controls_section(
            'image_style',
            [
                'label' => __('Photo', 'team-section'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // $this->add_responsive_control(
        //     'image_width',
        //     [
        //         'label' => __('Width', 'team-section'),
        //         'type' => Controls_Manager::SLIDER,
        //         'size_units' => ['px', '%'],
        //         'range' => [
        //             '%' => [
        //                 'min' => 20,
        //                 'max' => 100,
        //             ],
        //             'px' => [
        //                 'min' => 100,
        //                 'max' => 700,
        //             ],
        //         ],
        //         'selectors' => [
        //             '{{WRAPPER}} .our-team-image img' => 'width: {{SIZE}}{{UNIT}}',
        //         ],
        //     ]
        // );

        // $this->add_responsive_control(
        //     'image_height',
        //     [
        //         'label' => __('Hight', 'team-section'),
        //         'type' => Controls_Manager::SLIDER,
        //         'size_units' => ['px', '%'],
        //         'range' => [
        //             '%' => [
        //                 'min' => 20,
        //                 'max' => 100,
        //             ],
        //             'px' => [
        //                 'min' => 100,
        //                 'max' => 700,
        //             ],
        //         ],
        //         'selectors' => [
        //             '{{WRAPPER}} .our-team-image img' => 'height: {{SIZE}}{{UNIT}}',
        //         ],
        //     ]
        // );
        $this->add_responsive_control(
            'image_spacing',
            [
                'label' => __('Bottom Spacing', 'team-section'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .our-team-image' => 'margin-bottom:{{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_padding',
            [
                'label' => __('Padding', 'team-section'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .our-team-image img' => 'padding:{{TOP}}{{UNIT}}{{RIGHT}}{{UNIT}}{{BOTTOM}}{{UNIT}}{{LEFT}}{{UNIT}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'selector' => '{{WRAPPER}} .our-team-image img',
            ]
        );

        $this->add_responsive_control(
            'image_border_radius',
            [
                'label' => __('Border Radius', 'team-section'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .our-team-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'image_box_shadow',
                'exclude' => [
                    'box_shadow_position',
                ],
                'selector' => '{{WRAPPER}} .our-team-image img',
            ]
        );
        $this->add_control(
            'image_bg_color',
            [
                'label' => __('Background Color', 'team-section'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-team-image img' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
        // START MEMBER INFO STYLING
        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __('Member Info', 'team-section'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __('Content Padding', 'team-section'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .team-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'content_background',
            [
                'label' => __('Content Background', 'team-section'),
                'type' => Controls_Manager::COLOR,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .team-content' => 'background-color:{{VALUE}}',
                ],

            ]
        );
        $this->add_control(
            '_heading_title',
            [
                'label' => __('Name', 'team-section'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'name_spacing',
            [
                'label' => __('Bottom Spacing', 'team-section'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .member-name' => 'margin-bottom:{{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'name_color',
            [
                'label' => __('Text Color', 'team-section'),
                'type' => Controls_Manager::COLOR,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .member-name' => 'color:{{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography',
                'selector' => '{{WRAPPER}} .member-name',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'name_text_shadow',
                'selector' => '{{WRAPPER}} .member-name',
            ]
        );
        $this->add_control(
            '_heading_job_title',
            [
                'label' => __('Job Title', 'team-section'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'job_title_spacing',
            [
                'label' => __('Bottom Spacing', 'team-section'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .job-title' => 'margin-bottom:{{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'job_title_color',
            [
                'label' => __('Text Color', 'team-section'),
                'type' => Controls_Manager::COLOR,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .job-title' => 'color:{{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'job_title_typography',
                'selector' => '{{WRAPPER}} .job-title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'job-title_text_shadow',
                'selector' => '{{WRAPPER}} .job-title',
            ]
        );

        $this->add_control(
            '_heading_desc',
            [
                'label' => __('Short Description', 'team-section'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'short_desc_spacing',
            [
                'label' => __('Bottom Spacing', 'team-section'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .member-desc' => 'margin-bottom:{{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'sort_desc_color',
            [
                'label' => __('Text Color', 'team-section'),
                'type' => Controls_Manager::COLOR,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .member-desc' => 'color:{{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'short_desc_typography',
                'selector' => '{{WRAPPER}} .member-desc',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'short_desc_text_shadow',
                'selector' => '{{WRAPPER}} .member-desc',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'social_links_style',
            [
                'label' => __('Social Icons', 'team-section'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_social_icons' => 'yes',
                ],
            ]
        );
        $this->add_responsive_control(
            'links_spacing',
            [
                'label' => __('Right Spacing', 'team-section'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .member-social-links > a:not(:last-child)' => 'margin-right: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'links_padding',
            [
                'label' => __('Padding', 'team-section'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .member-social-links > a' => 'padding: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_size',
            [
                'label' => __('Icon Size', 'team-section'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .member-social-links > a > i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'links_border',
                'selector' => '{{wrapper}} .member-social-links > a',
            ]
        );
        $this->add_responsive_control(
            'links_border_radius',
            [
                'label' => __('Border Radius', 'team-section'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .member-social-links > a' => 'border-radius:{{TOP}}{{UNIT}}{{RIGHT}}{{UNIT}}{{BOTTOM}}{{UNIT}}{{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->end_controls_section();

    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        // inline editing
        $this->add_inline_editing_attributes('name', 'basic');
        $this->add_inline_editing_attributes('job_title', 'basic');
        $this->add_inline_editing_attributes('bio', 'basic');
        $this->add_render_attribute('name', array('class' => 'member-name'));
        $this->add_render_attribute('job_title', array('class' => 'job-title'));
        $this->add_render_attribute('bio', array('class' => 'bio'));
        $get_name = $this->get_render_attribute_string('name');
        $get_job_title = $this->get_render_attribute_string('job_title');
        $get_bio = $this->get_render_attribute_string('bio');


        $header_tag = $settings['header_tag'];
        $job_title = $settings['job_title'];
        $name = $settings['name'];
        $bio = $settings['bio'];
        $social_links = $settings['social_links'];

        // echo $team_section;
        $team_section = '<div class="col-sm-12">';
        $team_section .= '<div class="our-team">';
        $team_section .= '<div class="our-team-image">';
        $team_section .= Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'image');
        $team_section .= '</div>';
        $team_section .= '<div class="team-content">';
        $team_section .= '<'. $header_tag.' '.$get_name.'>' . $name . '</' . $header_tag . '>';
        $team_section .= '<span '.$get_job_title.'>' . $job_title . '</span>';
        $team_section .= '<span '.$get_bio.'>' . $bio . '</span>';
        $team_section .= '<div class="member-social-links mt-20">';
        if ('yes' === $settings['show_social_icons']) {
            foreach ($social_links as $key => $link) {
                $team_section .= '<a href="' . $link['link_url']['url'] . '"><i class="' . $link['link_icon'] . '"></i></a>';
            }

        }

        $team_section .= '</div>';
        $team_section .= '</div>';
        $team_section .= '</div>';
        $team_section .= '</div>';
        echo $team_section;
    }
    /*
    protected function _content_template()
    {?>

        <#
		view.addInlineEditingAttributes( 'name', 'none' );
		view.addInlineEditingAttributes( 'job_title', 'basic' );
		view.addInlineEditingAttributes( 'bio', 'advanced' );
		#>
        <h2 {{{ view.getRenderAttributeString( 'name' ) }}}>{{{ settings.name }}}</h2>
		<div {{{ view.getRenderAttributeString( 'job_title' ) }}}>{{{ settings.job_title }}}</div>
		<div {{{ view.getRenderAttributeString( 'bio' ) }}}>{{{ settings.bio }}}</div>
        <?php
    }
    */
}