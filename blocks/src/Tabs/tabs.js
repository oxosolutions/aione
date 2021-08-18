/**
 * BLOCK: Aione Tabs.
 */
//import './style.scss';
//import './editor.scss'; 
import {
    SortableContainer,
    SortableElement,
    SortableHandle,
    arrayMove,
} from 'react-sortable-hoc';
const { __ } = wp.i18n;
const { Component } = wp.element;
const { registerBlockType } = wp.blocks;
const { 
    InspectorControls,
    BlockControls,
    RichText,
} = wp.editor;
const {
    PanelBody,
    TextControl,
    SelectControl,
    IconButton,
    Dashicon,
    ToggleControl
} = wp.components;


registerBlockType( 'aione-blocks/aione-tabs', {
	title: __( 'Aione Tabs' ),
	icon: 'index-card',
	category: 'aione-blocks',
	keywords: [
		__( 'Tabs' ),
		__( 'Aione' ),
	],
	attributes: {
        id: {
            type: 'number',
            default: -1,
        },
        activeControl: {
            type: 'string',
        },
        activeTab: {
            type: 'number',
            default: 0,
        },
        timestamp: {
            type: 'number',
            default: 0,
        },
        tabsContent: {
            source: 'query',
            selector: '.wp-block-aione-tabbed-content-tab-content-wrap',
            query: {
                content: {
                    type: 'array',
                    source: 'children',
                    selector: '.wp-block-aione-tabbed-content-tab-content',
                },
            },
        },
        tabsTitle: {
            source: 'query',
            selector: '.wp-block-aione-tabbed-content-tab-title-wrap',
            query: {
                content: {
                    type: 'array',
                    source: 'children',
                    selector: '.wp-block-aione-tabbed-content-tab-title',
                },
            },
        },
        direction: {
            type: 'string',
            default: 'horizontal'
        },
        alignment: {
            type: 'string',
            default: 'align-left'
        },
        layout: {
            type: 'string',
            default: ''
        },
        theme: {
            type: 'string',
            default: 'theme-clean'
        },
        margin: {
            default: false,
            type:'boolean'
        },
        hover: {
            default: false,
            type:'boolean'
        },
    },

    edit: function( props ) {
        const {
            isSelected,
            editable,
            setState,
            className, setAttributes, attributes
        } = props;

        const onSetActiveEditable = ( newEditable ) => () => {
            setState( { editable: newEditable } )
        };

        const {
            activeControl, activeTab, timestamp, direction, alignment, layout, theme, margin, hover 
        } = props.attributes;

        window.aioneTabbedContentBlocks = window.aioneTabbedContentBlocks || [];

        let block = null;

        for ( const bl of window.aioneTabbedContentBlocks ) {
            if ( bl.id === attributes.id ) {
                block = bl;
                break;
            }
        }

        if ( ! block ) {
            block = {
                id: window.aioneTabbedContentBlocks.length,
                SortableItem: null,
                SortableList: null,
            };
            window.aioneTabbedContentBlocks.push( block );
            props.setAttributes( { id: block.id } );
        }

        if ( ! attributes.tabsContent ) {
            attributes.tabsContent = [];
        }

        if ( ! attributes.tabsTitle ) {
            attributes.tabsTitle = [];
        }

        const updateTimeStamp = () => {
            setAttributes( { timestamp: ( new Date() ).getTime() } );
        };

        const showControls = ( type, index ) => {
            setAttributes( { activeControl: type + '-' + index } );
            setAttributes( { activeTab: index } );
        };

        const onChangeTabContent = ( content, i ) => {
            attributes.tabsContent[ i ].content = content;
            updateTimeStamp();
        };

        const onChangeTabTitle = ( content, i ) => {
            attributes.tabsTitle[ i ].content = content;
            updateTimeStamp();
        };

        const addTab = ( i ) => {
            attributes.tabsTitle[ i ] = { content: 'Tab Title' };
            setAttributes( { tabsTitle: attributes.tabsTitle } );
            attributes.tabsContent[ i ] = { content: '' };
            setAttributes( { tabsContent: attributes.tabsContent } );
            setAttributes( { activeTab: i } );
            showControls( 'tab-title', i );
            updateTimeStamp();
        };

        const removeTab = ( i ) => {
            const tabsTitleClone = attributes.tabsTitle.slice( 0 );
            tabsTitleClone.splice( i, 1 );
            setAttributes( { tabsTitle: tabsTitleClone } );
            const tabsContentClone = attributes.tabsContent.slice( 0 );
            tabsContentClone.splice( i, 1 );
            setAttributes( { tabsContent: tabsContentClone } );
            setAttributes( { activeTab: 0 } );
            showControls( 'tab-title', 0 );
            updateTimeStamp();
        };

        const onChangeDirection = ( value ) => setAttributes( { direction: value } );
        const onChangeAlignment = ( value ) => setAttributes( { alignment: value } );
        const onChangeLayout = ( value ) => setAttributes( { layout: value } );
        const onChangeTheme = ( value ) => setAttributes( { theme: value } );

        if ( attributes.tabsContent.length === 0 ) {
            addTab( 0 );
        }

        const onSortEnd = ( { oldIndex, newIndex } ) => {
            const titleItems = attributes.tabsTitle.slice( 0 );
            setAttributes( { tabsTitle: arrayMove( titleItems, oldIndex, newIndex ) } );
            const contentItems = attributes.tabsContent.slice( 0 );
            setAttributes( { tabsContent: arrayMove( contentItems, oldIndex, newIndex ) } );
            setAttributes( { activeTab: newIndex } );    
            showControls( 'tab-title', newIndex );
        };

        const DragHandle = SortableHandle( () => <span className="dashicons dashicons-move drag-handle"></span> );

        if ( ! block.SortableItem ) {
            block.SortableItem = SortableElement( ( { value, i, propz, onChangeTitle, onRemoveTitle, toggleTitle } ) => {
        
                return (
                    <div
                        className={ propz.className + '-tab-title-wrap SortableItem' + ( propz.attributes.activeTab === i ? ' active' : '' ) }
                        style={ { backgroundColor: propz.attributes.activeTab === i ? propz.attributes.theme : 'theme-clean' } }
                        data-target = { '#tab_'+i }>
                        <RichText
                            tagName="div"
                            className={ propz.className + '-tab-title ' }
                            value={ value.content }
                            formattingControls={ [ 'bold', 'italic' ] }
                            isSelected={ propz.attributes.activeControl === 'tab-title-' + i && propz.isSelected }
                            onClick={ () => toggleTitle( 'tab-title', i ) }
                            onChange={ ( content ) => onChangeTitle( content, i ) }
                            placeholder="Tab Title"
                        />
                        <div class="tab-actions">
                            <DragHandle />
                            <span className={ 'dashicons dashicons-minus remove-tab-icon' + ( propz.attributes.tabsTitle.length === 1 ? ' aione-hide' : '' ) } onClick={ () => onRemoveTitle(i) }></span>
                        </div>
                    </div>
                );
            });
        }

        if ( ! block.SortableList ) {
            block.SortableList = SortableContainer( ( { items, propz, onChangeTitle, onRemoveTitle, toggleTitle, onAddTab } ) => {
                return (
                    <div className={ className + '-tabs-title SortableList nav' }>
                        { items.map( ( value, index ) => {
                            return <block.SortableItem propz={ propz } key={ `item-${ index }` } i={ index } index={ index } value={ value } onChangeTitle={ onChangeTitle } onRemoveTitle={ onRemoveTitle } toggleTitle={ toggleTitle } />;
                        } ) }
                        <div className={ className + '-tab-title-wrap' } key={ propz.attributes.tabsTitle.length } onClick={ () => onAddTab( propz.attributes.tabsTitle.length ) } >
                            <span className="dashicons dashicons-plus-alt"></span>
                        </div>
                    </div>
                );
            } );
        }

        let marginClass = '';
        if ( margin === true ) {
            marginClass = 'margin';
        }
        let hoverClass = '';
        if ( hover === true ) {
            hoverClass = 'hover';
        }

        return [
            isSelected && (
                <InspectorControls>
                    <PanelBody title={ __( 'Settings' ) } initialOpen={ false }>
                    <div className="blocks-font-size__main">
                    <SelectControl
                        label={ __( 'Select Direction:' ) }
                        value={ direction } 
                        onChange={ onChangeDirection }
                        options={ [
                            { value: 'horizontal', label: 'Horizontal' },
                            { value: 'vertical', label: 'Vertical' },
                        ] }
                    />
                    <SelectControl
                        label={ __( 'Select Text Alignment:' ) }
                        value={ alignment } 
                        onChange={ onChangeAlignment }
                        options={ [
                            { value: 'align-left', label: 'Align Left' },
                            { value: 'align-center', label: 'Align Center' },
                            { value: 'align-right', label: 'Align Right' },
                        ] }
                    />
                    <SelectControl
                        label={ __( 'Layout Position:' ) }
                        help={ __( 'This will work only with VERTICAL direction' ) }
                        value={ layout } 
                        onChange={ onChangeLayout }
                        options={ [
                            { value: 'layout-left', label: 'Layout Left' },
                            { value: 'layout-right', label: 'Layout Right' },
                        ] }
                    />
                    <SelectControl
                        label={ __( 'Select Theme:' ) }
                        value={ theme } 
                        onChange={ onChangeTheme }
                        options={ [
                            { value: 'theme-clean', label: 'Theme Clean' },
                            { value: 'theme-bold', label: 'Theme Bold' },
                            { value: 'theme-pastel', label: 'Theme Pastel' },
                            { value: 'theme-pointer', label: 'Theme Pointer' },
                            { value: 'theme-arrow', label: 'Theme Arrow' },
                        ] }
                    />
                    <ToggleControl
                        label={ __( 'Enable Margin' ) }
                        checked={  !! margin } 
                        onChange={ ()=>
                                    props.setAttributes( { margin: ! margin })    
                                }
                    />
                    <ToggleControl
                        label={ __( 'Hover' ) }
                        checked={  !! hover } 
                        onChange={ ()=>
                                    props.setAttributes( { hover: ! hover })    
                                }
                    />
                </div>
                </PanelBody>
            </InspectorControls>
            ),
            <div className={ className } key="tabber">
                <div className={ className + '-holder' + ' aione-tabs ' + direction + ' ' + alignment + ' ' + layout + ' ' + theme + ' ' + marginClass + ' ' + hoverClass }>
                    {
                       <block.SortableList axis="x" propz={ props } items={ attributes.tabsTitle } onSortEnd={ onSortEnd } useDragHandle={ true } onChangeTitle={ onChangeTabTitle } onRemoveTitle={ removeTab } toggleTitle={ showControls } onAddTab={ addTab } />
                    }
                    <div className={ className + '-tabs-content content' }>
                        {
                            attributes.tabsContent.map( ( tabContent, i ) => {
                                return <div id={ 'tab_'+i } className={ className + '-tab-content-wrap' + ( attributes.activeTab === i ? ' active' : ' ' ) } key={ i }>
                                    <RichText
                                        tagName="div"
                                        className={ className + '-tab-content' }
                                        value={ tabContent.content }
                                        formattingControls={ [ 'bold', 'italic', 'strikethrough', 'link' ] }
                                        isSelected={ attributes.activeControl === 'tab-content-' + i && isSelected }
                                        onClick={ () => showControls( 'tab-content', i ) }
                                        onChange={ ( content ) => onChangeTabContent( content, i ) }
                                        placeholder="Enter the Tab Content here..."
                                    />
                                </div>;
                            } )
                        }
                    </div>
                </div>
            </div>,
        ];
    },

    save: function( props ) {
        const className = 'wp-block-aione-tabbed-content';

        const { activeTab, direction, alignment, layout, theme, margin, hover } = props.attributes;

        let marginClass = '';
        if ( margin === true ) {
            marginClass = 'margin';
        }
        let hoverClass = '';
        if ( hover === true ) {
            hoverClass = 'hover';
        }

        return <div data-id={ props.attributes.id }>
            <div className={ className + '-holder'  + ' aione-tabs ' + direction + ' ' + alignment + ' ' + layout + ' ' + theme + ' ' + marginClass + ' ' + hoverClass  }>
                <div className={ className + '-tabs-title' + ' nav' }>
                    {
                        props.attributes.tabsTitle.map( ( value, i ) => {
                            return <div
                                data-target = { '#tab_'+i } className={ className + '-tab-title-wrap' + ( activeTab === i ? ' active' : '' ) }
                                //style={ { backgroundColor: activeTab === i ? theme : 'initial', borderColor: activeTab === i ? theme : 'lightgrey', color: '#000000' } }
                                key={ i }>
                                <div className={ className + '-tab-title' }>
                                    { value.content }
                                </div>
                            </div>;
                        } )
                    }
                </div>
                <div className={ className + '-tabs-content' + ' content' }>
                    {
                        props.attributes.tabsContent.map( ( value, i ) => {
                            return <div id={ 'tab_'+i } className={ className + '-tab-content-wrap' + ( activeTab === i ? ' active' : '' ) } key={ i }>
                                <div className={ className + '-tab-content' }>
                                    { value.content }
                                </div>
                            </div>;
                        } )
                    }
                </div>
            </div>
        </div>;
    },
} );
