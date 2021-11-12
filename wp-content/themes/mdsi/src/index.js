// import { registerBlockType } from @wordpress/blocks;
// import { 
//     RichText,
//     InspectorControls,
//     ColorPalette
// } from @wordpress/block-editor;
const  { PanelBody } from @wordpress/components;

registerBlockType('mdsi/custom-mdsi', {
    // built-in attributes
    title: 'Call to Action',
    description: 'Block to generate a custom Call to Action',
    icon: 'format-image',
    category: 'media',

    // custom attributes
    attributes: {
        title: {
            type: 'string',
            source: 'html',
            selector: 'h2'
        },
        titleColor: {
            type: 'string',
            default: 'black'
        },
        body: {
            type: 'string',
            source: 'html',
            selector: 'p'
        }
    },


    // built-in functions
    edit({ attributes, setAttributes }) {
        const {
            title,
            body,
            titleColor
        } = attributes;

        // custom functions
        function onChangeTitle(newTitle) {
            setAttributes( { title: newTitle } );
        }

        function onChangeBody(newBody) {
            setAttributes( { body: newBody } );
        }

        function onTitleColorChange(newColor) {
            setAttributes( { titleColor: newColor } );
        }

        function onBodyColorChange(newColor) {
            setAttributes( { bodyColor: newColor } );
        }

        // JSX
        return ([
            <InspectorControls style={{ marginBottom: '40px' }}>
                <PanelBody title={ 'Font Color Settings' }>
                    <p><strong>Select a Title color:</strong></p>
                    <ColorPalette  value={ titleColor }
                                    onChange={ onTitleColorChange } />
                </PanelBody>
            </InspectorControls>,
            <div class="test">
                <RichText   key="editable"
                            tagName="h2"
                            placeholder="Your title"
                            value={ attributes.title }
                            onChange={ onChangeTitle }
                            style={ { color: titleColor } } />
                <RichText   key="editable"
                            tagName="p"
                            placeholder="Your body"
                            value={ attributes.body }
                            onChange={ onChangeBody }
                            style={ { color: bodyColor } } />
            </div>
        ]);   
    },

    save({ attributes }) {
        const {
            title,
            body,
            titleColor
        } = attributes;

        return (
            <div class="test">
                <h2 style={ { color: titleColor } }>{ title }</h2>
                <RichText.Content   tagName="p" 
                                    value={ body }
                                    />
            </div>
        );   
    }
});