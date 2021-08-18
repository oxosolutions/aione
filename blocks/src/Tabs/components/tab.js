import icon from "../icons/icon";

const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;

const { InnerBlocks } = wp.blockEditor;
const { withSelect } = wp.data;

registerBlockType("aione-blocks/aione-tab", {
	title: __("Tab"),
	parent: __("aione-blocks/aione-tabs"),
	description: __("content of tab"),
	icon: icon,
	category: "aione-blocks",
	attributes: {
		index: {
			type: "number",
			default: 0,
		},
		isActive: {
			type: "boolean",
			default: true,
		},
	},
	supports: {
		inserter: false,
		reusable: false,
	},
	edit(props) {
		return (
			<div style={{ display: props.attributes.isActive ? "block" : "none" }}>
				<InnerBlocks templateLock={false} />
			</div>
		);
	},
	save(props) {
		return (
			<div
				className={`wp-block-aione-tabs-content-tab-content-wrap ${
					props.attributes.isActive ? "active" : "ub-hide"
				}`}
			>
				<InnerBlocks.Content />
			</div>
		);
	},
});

registerBlockType("aione-blocks/aione-tab-block", {
	title: __("Tab"),
	parent: __("aione-blocks/aione-tabs-block"),
	description: __("content of tab"),
	icon: icon,
	category: "aione-blocks",
	attributes: {
		index: {
			type: "number",
			default: 0,
		},
		isActive: {
			type: "boolean",
			default: true,
		},
		parentID: {
			type: "string",
			default: "",
		},
	},
	supports: {
		inserter: false,
		reusable: false,
	},
	edit: withSelect((select, ownProps) => ({
		blockParentId: (
			select("core/block-editor") || select("core/editor")
		).getBlockRootClientId(ownProps.clientId),
	}))(function (props) {
		const { blockParentId, setAttributes } = props;
		const { parentID, isActive } = props.attributes;

		if (parentID === "" || parentID !== blockParentId) {
			setAttributes({ parentID: blockParentId });
		}
		return (
			<div style={{ display: isActive ? "block" : "none" }}>
				<InnerBlocks
					templateLock={false}
					template={[
						[
							"core/paragraph",
							{ placeholder: __("Enter content for this tab") },
						],
					]}
					renderAppender={() => <InnerBlocks.ButtonBlockAppender />}
				/>
			</div>
		);
	}),
	save: () => <InnerBlocks.Content />,
});
