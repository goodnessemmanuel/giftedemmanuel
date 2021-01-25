/**
 * gutenberg editor
 * biography banner
 * component
 */
import block_icons from "../../icons/index";

const { __ }                                = wp.i18n;
const { MediaUpload, MediaUploadCheck}      = wp.blockEditor;
const { Button }                            = wp.components;


function BiographyBanner( $props ) {
    const props = $props.bio_prop;
    console.log('props is ');
    console.log(props);

    const  featureImageUrl = props.attributes.feature_img_url;
    console.log(`image url is ${featureImageUrl}`)

    const select_img = ( img ) => {
        props.setAttributes({
            img_ID:     img.id,
            img_alt:    img.alt,
            img_URL:    img.url
        });
    }

    const remove_img = () => {
        props.setAttributes({
            img_ID:     null,
            img_alt:    null,
            img_URL:    null
        });
    }

    return (
        <div id='banner' className={`banner align${props.attributes.block_alignment}`}
             style={{backgroundImage: `url(${props.attributes.feature_img_url})`}}>
            <div className={`container`}>
                <div className={`row`}>
                    <div className={`col-md-1 col-lg-2`}>
                        { props.attributes.file_upl ? (
                            <div className={`cv`}>
                                <a className={`download_cv`}
                                   href={ props.attributes.file_upl } target="_blank">
                                    <span style={ {color: 'white'} }>Download CV</span>
                                </a>
                                { props.isSelected ? (
                                    <Button className='btn-remove'
                                            onClick={ () => {
                                                props.setAttributes({file_upl: null});
                                            } }
                                    style={{color: 'red'}}>
                                        { __("Remove CV", "biography") }
                                    </Button>
                                ) : null }
                            </div>
                        ) : (
                            <MediaUploadCheck>
                                <MediaUpload
                                    allowedType={ ['application/msword', 'application/pdf'] }
                                    value={ props.attributes.file_upl }
                                    onSelect={ (file) => {
                                        props.setAttributes({file_upl: file.url});
                                    }}
                                    render={ ({ open }) => (
                                        <Button className='button button-large' onClick={ open }>
                                            { __("Upload CV", "biography") }
                                        </Button>
                                    )}/>
                            </MediaUploadCheck>
                        )}
                    </div>
                    <div className={`col-md-10 col-lg-8 mx-2`}>
                        <div className={`banner_item`}>
                                { props.attributes.img_ID ? (
                                    <div className="profile_pic ">
                                        <img src={props.attributes.img_URL}
                                             alt={props.attributes.img_alt}
                                             className='img-fluid'/>
                                        { props.isSelected ? (
                                            <Button className='btn-remove'
                                                    onClick={ remove_img }>
                                                { block_icons.close }
                                            </Button>
                                        ) : null }
                                    </div>
                                ) : (
                                    <MediaUploadCheck>
                                        <MediaUpload
                                            allowedType={ ['image'] }
                                            value={props.attributes.img_ID}
                                            onSelect={ select_img }
                                            render={ ({ open }) => (
                                                <Button className='button button-large' onClick={ open }>
                                                    { __("Upload profile image", "biography") }
                                                </Button>
                                            )}/>
                                    </MediaUploadCheck>
                                )}
                            <div className={`banner_text`} style={{textAlign: props.attributes.text_alignment}}>
                                <h2><b className={`full_name-ph`}>{ props.attributes.full_name }</b></h2>
                                <h5 className={`occupation-ph`}>{ props.attributes.occupation }</h5>
                                <ul className={`basic_info`}>
                                    <li><b>{ __('BORN', 'biography') } : </b>
                                        <span className={`date_of_birth-ph`}>{ props.attributes.date_of_birth }</span>
                                    </li>
                                    <li><b>{ __('Email', 'biography') } : </b>
                                        <span className={`email-ph`}>{ props.attributes.email }</span>
                                    </li>
                                    <li><b>{ __('Marital Status', 'biography') } : </b>
                                        <span className={`marital_status-ph`}>{ props.attributes.marital_status }</span>
                                    </li>
                                </ul>
                                <ul className={`social_info`}>
                                    <li><a className="fa-facebook-ph"
                                           href={ props.attributes.fbk_link }
                                           target="_blank">
                                        <i className={`fa fa-facebook`}>
                                        </i></a></li>
                                    <li><a className='fa-twitter-ph'
                                        href={ props.attributes.twi_link }
                                        target="_blank">
                                        <i className={`fa fa-twitter`}>
                                        </i></a></li>
                                    <li><a className='fa-pinterest-ph'
                                            href={ props.attributes.pin_link }
                                            target="_blank">
                                        <i className={`fa fa-pinterest`}>
                                        </i></a></li>
                                    <li><a  className='fa-linkedin-ph'
                                            href={ props.attributes.lin_link }
                                            target="_blank">
                                        <i className={`fa fa-linkedin`}>
                                        </i></a></li>
                                    <li><a className='fa-instagram-ph'
                                           href={ props.attributes.ins_link }
                                           target="_blank">
                                        <i className={`fa fa-instagram`}>
                                        </i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default BiographyBanner;