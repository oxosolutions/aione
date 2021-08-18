/**
 * BLOCK: Aione Social Share.
 */

const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { 
    InspectorControls,
    BlockControls,
    RichText
} = wp.editor;
const {
    PanelBody,
    TextControl,
    SelectControl,
    ToggleControl
} = wp.components;


registerBlockType( 'aione-blocks/aione-social-share', {
	title: __( 'Aione Social Share' ),
	icon: 'share',
	category: 'aione-blocks',
	keywords: [
        __( 'Social Share' ),
		__( 'Social Icons' ),
		__( 'Aione' ),
	],
    supports:{
        customClassName: true,
        html:false
    },
	attributes: {
        socialIconSize: {
            type: 'string',
            default: 'small'
        },
        socialIconStyle: {
            type: 'string',
            default: 'square'
        }, 
        socialIconDirection: {
            type: 'string',
            default: 'horizontal'
        }, 
        socialIconTheme: {
            type: 'string',
            default: 'colored'
        }, 
        socialIconLabels: {
            type: 'boolean',
            default: false
        },
        facebook: {
            default: true,
            type:'boolean'
        },
        twitter: {
            default: true,
            type:'boolean'
        },
        linkedin: {
            default: true,
            type:'boolean'
        },
        pinterest: {
            default: false,
            type:'boolean'
        },
        
        tumblr: {
            default: false,
            type:'boolean'
        },
        reddit: {
            default: false,
            type:'boolean'
        },  
    },
    edit: ( function( props )
        {
            const {
                isSelected,
                editable,
                setState
            } = props;

            const onSetActiveEditable = ( newEditable ) => () => {
                setState( { editable: newEditable } )
            };

            const {
                socialIconSize,
                socialIconStyle,
                socialIconDirection,
                socialIconTheme,
                socialIconLabels,
                facebook,
                twitter,
                linkedin,
                pinterest,
                tumblr,
                reddit,
            } = props.attributes;

            
            const onChangeSocialIconSize = selectedSize => {
                props.setAttributes( { socialIconSize: selectedSize } );
            };
            const onChangeSocialIconStyle = selectedStyle => {
                props.setAttributes( { socialIconStyle: selectedStyle } );
            };
            const onChangeSocialIconDirection = selectedDirection => {
                props.setAttributes( { socialIconDirection: selectedDirection } );
            };
            const onChangeSocialIconTheme = selectedTheme => {
                props.setAttributes( { socialIconTheme: selectedTheme    } );
            };
            let classes = '';
            if ( socialIconLabels === true ) {
                classes = 'labels';
            }

            return [
                isSelected && (
                    <InspectorControls>
                        <PanelBody title={ __( 'Enable/Disable Links' ) } initialOpen={ false }>
                            <div className="blocks-font-size__main">
                                <ToggleControl
                                    label={ __( 'Facebook' ) }
                                    checked={  !! facebook } 
                                    onChange = {()=>
                                                props.setAttributes( { facebook: ! facebook } )
                                            }
                                />
                                <ToggleControl
                                    label={ __( 'Twitter' ) }
                                    checked={  !! twitter } 
                                    onChange={ ()=>
                                                props.setAttributes( { twitter: ! twitter })    
                                            }
                                /> 
                                <ToggleControl
                                    label={ __( 'LinkedIn' ) }
                                    checked={  !! linkedin } 
                                    onChange={ ()=>
                                                props.setAttributes( { linkedin: ! linkedin })    
                                            }
                                /> 
                                
                                <ToggleControl
                                    label={ __( 'Pinterest' ) }
                                    checked={  !! pinterest } 
                                    onChange={ ()=>
                                                props.setAttributes( { pinterest: ! pinterest })    
                                            }
                                /> 
                                <ToggleControl
                                    label={ __( 'Reddit' ) }
                                    checked={  !! reddit } 
                                    onChange={ ()=>
                                                props.setAttributes( { reddit: ! reddit })    
                                            }
                                /> 
                                <ToggleControl
                                    label={ __( 'Tumblr' ) }
                                    checked={  !! tumblr } 
                                    onChange={ ()=>
                                                props.setAttributes( { tumblr: ! tumblr })    
                                            }
                                />                             
                            </div>
                        </PanelBody>
                        <PanelBody title={ __( 'Icon Options' ) } initialOpen={ false }>
                            <div className="blocks-font-size__main">
                                <SelectControl
                                    label={ __( 'Select Size:' ) }
                                    value={ socialIconSize } 
                                    onChange={ onChangeSocialIconSize }
                                    options={ [
                                        { value: 'small', label: 'Small' },
                                        { value: 'medium', label: 'Medium' },
                                        { value: 'large', label: 'Large' },
                                        { value: 'xlarge', label: 'XLarge' },
                                    ] }
                                />

                                <SelectControl
                                    label={ __( 'Select Style:' ) }
                                    value={ socialIconStyle } 
                                    onChange={ onChangeSocialIconStyle }
                                    options={ [
                                        { value: 'square', label: 'Square' },
                                        { value: 'rounded', label: 'Rounded' },
                                        { value: 'circle', label: 'Circle' },
                                    ] }
                                />

                                <SelectControl
                                    label={ __( 'Select Direction:' ) }
                                    value={ socialIconDirection } 
                                    onChange={ onChangeSocialIconDirection }
                                    options={ [
                                        { value: 'horizontal', label: 'Horizontal' },
                                        { value: 'vertical', label: 'Vertical' },
                                    ] }
                                />

                                <SelectControl
                                    label={ __( 'Select Theme:' ) }
                                    value={ socialIconTheme } 
                                    onChange={ onChangeSocialIconTheme }
                                    options={ [
                                        { value: 'colored', label: 'Colored' },
                                        { value: 'dark', label: 'Dark' },
                                        { value: 'dark-solid', label: 'Dark Solid' },
                                        { value: 'dark-outline', label: 'Dark Outline' },
                                        { value: 'light bg-black', label: 'Light' },
                                        { value: 'light-solid bg-black', label: 'Light Solid' },
                                        { value: 'light-outline bg-black', label: 'Light Outline' },
                                    ] }
                                />
                                <ToggleControl
                                    label={ __( 'Enable Labels' ) }
                                    checked={  !! socialIconLabels } 
                                    onChange={ () =>
                                                props.setAttributes( { socialIconLabels: ! socialIconLabels } )
                                              }
                                />
                            </div>
                        </PanelBody>
                    </InspectorControls> 
                ),
                <div  className={ props.className }>
                    <div className={ 'aione-social-icons-container' } >
                        <ul className={ 'aione-social-icons' + ' ' + socialIconSize + ' ' + socialIconStyle + ' ' + socialIconDirection + ' ' + socialIconTheme + ' ' +classes} >
                            { props.attributes.facebook && 
                                <li class={'facebook'}><a href={'#'} target='_blank'><span class='icon'></span><span class='label'>{'Facebook'}</span></a></li>
                            }
                            { props.attributes.twitter && 
                                <li class={'twitter'}><a href={'#'}  target='_blank'><span class='icon'></span><span class='label'>{'Twitter'}</span></a></li> 
                            }
                            { props.attributes.linkedin && 
                                <li class={'linkedin'}><a href={'#'}  target='_blank'><span class='icon'></span><span class='label'>{'LinkedIn'}</span></a></li> 
                            }
                            
                            { props.attributes.pinterest && 
                                <li class={'pinterest'}><a href={'#'}  target='_blank'><span class='icon'></span><span class='label'>{'Pinterest'}</span></a></li> 
                            }
                            { props.attributes.reddit && 
                                <li class={'reddit'}><a href={'#'}  target='_blank'><span class='icon'></span><span class='label'>{'Reddit'}</span></a></li> 
                            }
                            { props.attributes.tumblr && 
                                <li class={'tumblr'}><a href={'#'}  target='_blank'><span class='icon'></span><span class='label'>{'Tumblr'}</span></a></li> 
                            }
                        </ul>
                    </div>
                </div>

            ]
            
        }
   ),
    save: function( props ) {
        return null;
               
    },
	
} );
