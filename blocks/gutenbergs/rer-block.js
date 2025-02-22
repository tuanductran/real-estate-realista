(function( blocks, editor, components, i18n, element, url ) {
    var registerBlockType = blocks.registerBlockType;
    var RichText = editor.RichText;
    var URLInputButton = editor.URLInputButton;
    var __ = i18n.__;
    var el = element.createElement;

    registerBlockType( 'my-custom-block/my-block', {
        title: __( 'My Custom Block' ),
        icon: 'smiley',
        category: 'common',
        attributes: {
            title: {
                type: 'string',
                source: 'html',
                selector: '.title',
                default: 'Ready for a new address?',
            },
            text: {
                type: 'string',
                source: 'html',
                selector: '.text',
                default: 'Get an instant cash offer or list with a local partner agent.',
            },
            linkURL: {
                type: 'string',
                source: 'attribute',
                attribute: 'href',
                selector: 'a',
            },
            linkText: {
                type: 'string',
                source: 'html',
                selector: 'a',
                default: 'Explore selling options.',
            },
        },
        edit: function( props ) {
            var attributes = props.attributes;
            var setAttributes = props.setAttributes;
            var title = attributes.title;
            var text = attributes.text;
            var linkURL = attributes.linkURL;
            var linkText = attributes.linkText;

            var onChangeTitle = function( value ) {
                setAttributes( { title: value } );
            };

            var onChangeText = function( value ) {
                setAttributes( { text: value } );
            };

            var onChangeLinkURL = function( value ) {
                setAttributes( { linkURL: value } );
            };

            var onChangeLinkText = function( value ) {
                setAttributes( { linkText: value } );
            };

            return el(
                'div',
                { className: 'rer-block' },
                el( RichText, {
                    tagName: 'h2',
                    className: 'title',
                    value: title,
                    onChange: onChangeTitle,
                    placeholder: __( 'Enter title...' )
                } ),
                el( RichText, {
                    tagName: 'p',
                    className: 'text',
                    value: text,
                    onChange: onChangeText,
                    placeholder: __( 'Enter text...' )
                } ),
                el(
                    'div',
                    { className: 'actions' },
                    el( URLInputButton, {
                        url: linkURL,
                        onChange: onChangeLinkURL
                    } ),
                    el( RichText, {
                        tagName: 'a',
                        className: 'btn',
                        value: linkText,
                        onChange: onChangeLinkText,
                        placeholder: __( 'Enter link text...' )
                    } )
                )
            );
        },
        save: function( props ) {
            var attributes = props.attributes;
            var title = attributes.title;
            var text = attributes.text;
            var linkURL = attributes.linkURL;
            var linkText = attributes.linkText;

            return el(
                'div',
                { className: 'rer-block' },
                el( 'h2', { className: 'title' }, title ),
                el( 'p', { className: 'text' }, text ),
                el(
                    'div',
                    { className: 'actions' },
                    el( 'a', { href: linkURL, className: 'btn' }, linkText )
                )
            );
        },
    } );
}(
    window.wp.blocks,
    window.wp.editor,
    window.wp.components,
    window.wp.i18n,
    window.wp.element,
    window.wp.url
));
