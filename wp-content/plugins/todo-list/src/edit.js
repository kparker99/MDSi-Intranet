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
	BlockControls,
	AlignmentToolbar,
    InspectorControls,
    PanelColorSettings
} from '@wordpress/block-editor';
import {
	TextControl,
	PanelBody,
	PanelRow,
	ToggleControl,
	ExternalLink
} from '@wordpress/components';
import classnames from 'classnames';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */

export default function Edit( { attributes, setAttributes } ) {

	const { align, title, backgroundColor, textColor, affiliateLink, linkLabel, hasLinkNofollow } = attributes;

	const blockProps = useBlockProps( {
		className: classnames( {
			[ `has-text-align-${ align }` ]: align,
		} )
	} );

	const onChangeTitle = ( newTitle ) => {
		setAttributes( { title: newTitle } );
	}

	const onChangeAlign = ( newAlign ) => {
		setAttributes( { 
			align: newAlign === undefined ? 'none' : newAlign, 
		} );
	}

	const onChangeBackgroundColor = ( newBackgroundColor ) => {
		setAttributes( { backgroundColor: newBackgroundColor } );
	}

	const onChangeTextColor = ( newTextColor ) => {
		setAttributes( { textColor: newTextColor } );
	}

	const onChangeAffiliateLink = ( newAffiliateLink ) => {
		setAttributes( { affiliateLink: newAffiliateLink === undefined ? '' : newAffiliateLink } )
	}
	
	const onChangeLinkLabel = ( newLinkLabel ) => {
		setAttributes( { linkLabel: newLinkLabel === undefined ? '' : newLinkLabel } )
	}
	
	const toggleNofollow = () => {
		setAttributes( { hasLinkNofollow: ! hasLinkNofollow } )
	}

	return (
		<>
			<InspectorControls>
				<PanelColorSettings
					title={ __( 'Color settings', 'todo-list' ) }
					initialOpen={ false }
					colorSettings={ [
						{
							value: textColor,
							onChange: onChangeTextColor,
							label: __( 'Text color', 'todo-list' ),
						},
						{
							value: backgroundColor,
							onChange: onChangeBackgroundColor,
							label: __( 'Background color', 'todo-list' ),
						}
					] }
				/>
				<PanelBody 
					title={ __( 'Link Settings', 'todo-list' )}
					initialOpen={true}
				>
					<PanelRow>
						<fieldset>
							<TextControl
								label={__( 'Affiliate link', 'todo-list' )}
								value={ affiliateLink }
								onChange={ onChangeAffiliateLink }
								help={ __( 'Add your affiliate link', 'todo-list' )}
							/>
						</fieldset>
					</PanelRow>
					<PanelRow>
						<fieldset>
							<TextControl
								label={__( 'Link label', 'todo-list' )}
								value={ linkLabel }
								onChange={ onChangeLinkLabel }
								help={ __( 'Add link label', 'todo-list' )}
							/>
						</fieldset>
					</PanelRow>
					<PanelRow>
						<fieldset>
							<ToggleControl
								label="Add rel = nofollow"
								help={
									hasLinkNofollow
										? 'Has rel nofollow.'
										: 'No rel nofollow.'
								}
								checked={ hasLinkNofollow }
								onChange={ toggleNofollow }
							/>
						</fieldset>
					</PanelRow>
				</PanelBody>
			</InspectorControls>
			<BlockControls>
				<AlignmentToolbar
					value={ align }
					onChange={ onChangeAlign }
				/>
			</BlockControls>
			<div { ...blockProps } style={ { backgroundColor: backgroundColor } }>
				<RichText
					tagName="h2"
					placeholder={ __( "Your title", "todo-list" ) }
					allowedFormats={ [ 'core/bold', 'core/italic', 'core/link' ] }
					value={ title }
					onChange={ onChangeTitle }
					style={ {
						color: textColor
					} }
				/>
				<ExternalLink
					href={ affiliateLink }
					className="affiliate-button"
					rel={ hasLinkNofollow ? "nofollow" : ""}
					style={ {
						color: textColor
					} }
				>
					{ linkLabel }
				</ExternalLink>
			</div>
		</>
	);
}
