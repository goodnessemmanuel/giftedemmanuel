// console.log( wp );
import block_icons from "../icons";

import './editor.scss';
import SocialLinks from "./components/SocialLinks";
import BiographyBanner from "./components/BiographyBanner";

const { registerBlockType }                 = wp.blocks;
const { __ }                                = wp.i18n;
const { InspectorControls,
        BlockControls,
        BlockAlignmentToolbar,
        AlignmentToolbar}                   = wp.blockEditor;

const { withSelect }                        = wp.data;
const { PanelBody, DatePicker,
        PanelRow, ToggleControl,
        TextControl, SelectControl}                   = wp.components;

let date = new Date();

registerBlockType( "portfolio/biography",  {
    "title":           __("Biography", "biography"),
    "description":     __("Fill in your details to setup your biography", "biography"),
    "category":           "common",
    "icon":                block_icons.biography,
    "keywords": [
            __("Biography", "biography"),
            __("Banner", "biography"),
            __("Details", "biography")
    ],

    "attributes": {
        full_name: {
            source :    "text",
            default:    "John Doe",
            selector:   ".full_name-ph"
        },

        occupation: {
            source :    "text",
            default:    "Engineer",
            selector:   ".occupation-ph"
        },

        date_of_birth: {
            source : "text",
            default: `${date.toLocaleString('default', { month: 'short' })} ${date.getDate()}`,
            selector:  ".date_of_birth-ph"
        },

        email: {
            source : "text",
            default: "johndoe@gmail.com",
            selector:  ".email-ph"
        },

        marital_status: {
            source : "text",
            default: "None",
            selector:  ".marital_status-ph"
        },

        text_alignment: {
            type : "string"
        },

        block_alignment: {
            type:                       'string',
            default:                    'wide'
        },

        feature_img_url: {
            type:                       'string',
            default:                    ''
        },

        show_year: {
            type:                       'boolean',
            default:                     false
        },

        img_ID: {
            type:                        'number'
        },

        img_URL: {
            type:                        'string',
            source:                      'attribute',
            attribute:                   'src',
            selector:                    'img'
        },
        img_alt: {
            type:                        'string',
            source:                      'attribute',
            attribute:                   'alt',
            selector:                    'img'
        },

        file_upl: {
            type:                          'string',
            selector:                      '.download_cv'
        },
        
        fbk_link: {
            type:                           'string',
            source :                        'text',
            default:                        '#',
            selector:                       '.fa-facebook-ph'
        },
        twi_link: {
            type:                           'string',
            source :                        'text',
            default:                        '#',
            selector:                       '.fa-twitter-ph'
        },
        ins_link: {
            type:                           'string',
            source :                        'text',
            default:                        '#',
            selector:                       '.fa-instagram-ph'
        },
        lin_link: {
            type:                           'string',
            source :                        'text',
            default:                        '#',
            selector:                       '.fa-linkedin-ph'
        },
        pin_link: {
            type:                           'string',
            source :                        'text',
            default:                        '#',
            selector:                       '.fa-pinterest-ph'
        },
    },

    "supports": {
        html:       false
    },

    getEditWrapperProps: ({ block_alignment }) => {
        if( 'left' === block_alignment || 'right' === block_alignment || 'full' === block_alignment ){
            return { 'data-align': block_alignment };
        }
    },

    edit: withSelect( function( select ) {
        const { getMedia, getPostType } = select( 'core' );
        const { getCurrentPostId, getEditedPostAttribute } = select( 'core/editor' );
        const featuredImageId = getEditedPostAttribute( 'featured_media' );

        return {
            media: featuredImageId ? getMedia( featuredImageId ) : null,
            currentPostId: getCurrentPostId(),
            postType: getPostType( getEditedPostAttribute( 'type' ) )
        };
    } )( function ( props ) {
        if(props.isSelected && props.media){
            props.setAttributes({ feature_img_url: props.media.source_url })
        }
        const showBirthYear = () => {
            let day = date.getDate(),
                month = date.toLocaleString('default', { month: 'short' }),
                year = date.getFullYear();

            if(!props.attributes.show_year){
                props.setAttributes({date_of_birth: `${month} ${day}`});
            }else {
                props.setAttributes({date_of_birth: `${month} ${day}, ${year}`});
            }
        }

        return (
            [
                <InspectorControls>
                    <PanelBody title={ __("Profile", "biography") }>
                        <PanelRow>
                            <p>{ __( "Configure your profile content here", 'biography' ) }</p>
                        </PanelRow>

                        <TextControl
                            label={ __("Full Name", "biography") }
                            help={ __( "Ex: John Doe", "biology" ) }
                            value={ props.attributes.full_name }
                            placeholder={ __("John Doe", "biography") }
                            onChange={ (new_val)=> {
                                props.setAttributes({full_name: new_val})
                            } }
                        />
                        <TextControl
                            label={ __("Occupation", "biography") }
                            help={ __( "Ex: Engineer", "biology" ) }
                            value={ props.attributes.occupation }
                            onChange={ (new_val)=> {
                                props.setAttributes({occupation: new_val})
                            } }
                        />
                        <PanelRow>
                            <p>{ __( "Date Of Birth", 'biography' ) }</p>
                        </PanelRow>
                        <DatePicker
                            currentDate={ date }
                            onChange={ (new_val)=> {
                                date = new Date(new_val);
                                showBirthYear();
                            } }
                        />
                        <ToggleControl
                            label={ __( 'show birth year or not?', 'biography' ) }
                            help={ props.attributes.show_year ? 'Yes' : 'No' }
                            checked={ props.attributes.show_year }
                            onChange={ () => {
                                props.attributes.show_year = !props.attributes.show_year;
                                showBirthYear();
                            }}
                        />
                        <TextControl
                            label={ __("Email", "biography") }
                            help={ __( "Ex: johndoe@gmail.com", "biology" ) }
                            value={ props.attributes.email }
                            type="email"
                            placeholder={ __("johndoe@gmail.com", "biography") }
                            onChange={ (new_val)=> {
                                props.setAttributes({email: new_val})
                            } }
                        />

                        <SelectControl
                            label={ __("Marital Status", "biography") }
                            value={ props.setAttributes.marital_status }
                            options={[
                                {"label" : "None", "value" : "none"},
                                {"label" : "Single", "value" : "Single"},
                                {"label" : "Married", "value" : "Married"}
                            ]}
                            onChange={ (new_val)=>  {
                                props.setAttributes({marital_status: new_val})
                            } }
                        />
                    </PanelBody>
                    <SocialLinks bio_prop={ {...props} } />
                </InspectorControls>,
                <div>
                    <BlockControls>
                        <BlockAlignmentToolbar
                            value={ props.attributes.block_alignment }
                            onChange={ (new_val) => {
                                props.setAttributes({ block_alignment: new_val })
                            }}/>
                        <AlignmentToolbar
                            value={ props.attributes.text_alignment }
                            onChange={ (new_val) => {
                                props.setAttributes( {text_alignment: new_val} );
                            }}
                        />
                    </BlockControls>
                    <BiographyBanner bio_prop={ {...props} } />
                </div>
            ]
        );
    } ),
    save:  (props) => {
        return (
            <BiographyBanner bio_prop={ {...props} } />
        );
    }
})
