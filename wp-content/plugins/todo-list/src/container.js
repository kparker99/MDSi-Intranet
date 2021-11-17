import { registerBlockType } from "@wordpress/blocks";
import { __ } from "@wordpress/i18n";
import {
	useBlockProps, 
	InnerBlocks 
} from "@wordpress/block-editor";

const TEMPLATE = [ [ 'core/columns', { verticalAlignment: 'center' }, [
	[ 'core/column', { templateLock: 'insert' }, [
		[ 'core/image' ],
	] ],
	[ 'core/column', { templateLock: 'insert' }, [
		[ 'create-block/todo-list', { placeholder: 'Enter side content...' } ],
	] ],
] ] ];

registerBlockType('create-block/todo-list-container', {
	title: __( 'Container', 'todo-list' ),
	category: 'widgets',

	edit( { className } ) {
		
		return(
			<div className={ className }>
				<InnerBlocks
					template={ TEMPLATE }
					templateLock="insert"
				/>
			</div>
		)
	},

	save() {
		const blockProps = useBlockProps.save();
		return(
			<div { ...blockProps }>
				<InnerBlocks.Content />
			</div>
		)
	},
});