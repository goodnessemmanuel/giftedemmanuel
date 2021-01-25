/**
 * social media icon
 * components
 * @constructor
 */
const { __ }                                     = wp.i18n;
const { PanelBody, PanelRow, TextControl }       =  wp.components;


function SocialLinks($props) {
    const props = $props.bio_prop;

    return (
        <PanelBody title={ __("Social Links", "biography") }>
            <PanelRow>
                <p>{ __( "Enter your social media links here", 'biography' ) }</p>
            </PanelRow>
            <TextControl
                label={ __("Facebook", "biography") }
                help={ __( "Ex: web.facebook.com/john.doe", "biology" ) }
                value={ props.attributes.fbk_link }
                placeholder={ __("web.facebook.com/userid", "biography") }
                onChange={ (new_val)=> {
                    props.setAttributes({fbk_link: new_val})
                } }
            />
            <TextControl
                label={ __("Instagram", "biography") }
                help={ __( "Ex: www.instagram.com/userid", "biology" ) }
                value={ props.attributes.ins_link }
                placeholder={ __("www.instagram.com/userid", "biography") }
                onChange={ (new_val)=> {
                    props.setAttributes({ins_link: new_val})
                } }
            />
            <TextControl
                label={ __("Twitter", "biography") }
                help={ __( "Ex: twitter.com/userid", "biology" ) }
                value={ props.attributes.twi_link }
                placeholder={ __("twitter.com/userid", "biography") }
                onChange={ (new_val)=> {
                    props.setAttributes({twi_link: new_val})
                } }
            />
            <TextControl
                label={ __("Pinterest", "biography") }
                help={ __( "Ex: www.pinterest.com/userid", "biology" ) }
                value={ props.attributes.pin_link }
                placeholder={ __("www.pinterest.com/userid", "biography") }
                onChange={ (new_val)=> {
                    props.setAttributes({pin_link: new_val})
                } }
            />
            <TextControl
                label={ __("LinkedIn", "biography") }
                help={ __( "Ex: www.linkedin.com/userid", "biology" ) }
                value={ props.attributes.lin_link }
                placeholder={ __("www.linkedin.com/userid", "biography") }
                onChange={ (new_val)=> {
                    props.setAttributes({lin_link: new_val})
                } }
            />
        </PanelBody>

    );
}

export default SocialLinks;