const { registerBlockType } = wp.blocks;
const { RichText } = wp.blockEditor;

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
            body
        } = attributes;

        // custom functions
        function onChangeTitle(newTitle) {
            setAttributes( { title: newTitle } );
        }

        function onChangeBody(newBody) {
            setAttributes( { body: newBody } );
        }

        // JSX
        return ([
            <div class="test">
                <RichText   key="editable"
                            tagName="h2"
                            placeholder="Your title"
                            value={ attributes.title }
                            onChange={ onChangeTitle }/>
                <RichText   key="editable"
                            tagName="p"
                            placeholder="Your body"
                            value={ attributes.body }
                            onChange={ onChangeBody }/>
            </div>
        ]);   
    },

    save({ attributes }) {
        const {
            title,
            body
        } = attributes;

        return (
            <div class="test">
                <h2>{ title }</h2>
                <RichText.Content   tagName="p" 
                                    value={ body }
                                    />
            </div>
        );   
    }
});