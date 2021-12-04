/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-block-editor/#useBlockProps
 */
 import {
	useBlockProps, 
    RichText,
} from '@wordpress/block-editor';
import classnames from 'classnames';

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-edit-save/#save
 *
 * @return {WPElement} Element to render.
 */
 export default function save( { attributes } ) {
	const { align, title, backgroundColor, textColor, affiliateLink, linkLabel, hasLinkNofollow } = attributes;

	const blockProps = useBlockProps.save( {
		className: classnames( {
			[ `has-text-align-${ align }` ]: align,
		} )
	} );

	return (
		<div { ...blockProps } style={ { backgroundColor: backgroundColor } }>
			<RichText.Content  
				tagName="h2"
				value={ title }
				style={ { 
					textAlign: align,
					backgroundColor: backgroundColor,
					color: textColor
				} }
			/>
			<p>
				<a
					href={ affiliateLink }
					className="affiliate-button"
					rel={ hasLinkNofollow ? "nofollow" : "noopener noreferrer" }
					style={ { 
						color: textColor
					} }
				>
					{ linkLabel }
				</a>
			</p>
		</div>
	);
}
