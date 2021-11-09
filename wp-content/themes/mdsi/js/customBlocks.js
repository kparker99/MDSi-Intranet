const { registerBlockType } = wp.blocks;

registerBlockType('mdsi/custom-mdsi', {
    // built-in attributes
    title: 'Call to Action',
    description: 'Block to generate a custom Call to Action',
    icon: 'format-image',
    category: 'media',

    // custom attributes
    attributes: {},

    // custom functions


    // built-in functions
    edit() {
        // JSX
        return <div>Hello World</div>; 
    },

    save() {}
    }
);